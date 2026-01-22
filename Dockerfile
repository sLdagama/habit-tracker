# --- ESTÁGIO 1: Instalar dependências do PHP (Composer) ---
FROM composer:latest AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist --ignore-platform-reqs

# --- ESTÁGIO 2: Imagem Final ---
FROM php:8.4-apache

# Dependências do sistema
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev zip unzip git curl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Extensões PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# COPIAR O COMPOSER PARA O ESTÁGIO FINAL
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Ativar Apache Rewrite
RUN a2enmod rewrite

WORKDIR /var/www/html

# 1. Copiar o código fonte primeiro
COPY . .

# 2. GARANTIA DOS ASSETS: Copia a pasta compilada pelo Vite
# Certifique-se de ter rodado 'npm run build' na sua máquina antes do build do docker
COPY public/build ./public/build

# Trazer a pasta vendor do estágio anterior
COPY --from=vendor /app/vendor ./vendor

# Gerar o autoload do composer agora com o código real
RUN composer dump-autoload --optimize --no-dev

# Permissões (Crucial para o Laravel não dar erro 500)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Ajustar o Apache para a pasta /public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

EXPOSE 80