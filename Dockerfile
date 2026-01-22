# --- ESTÁGIO 1: Instalar dependências do PHP (Composer) ---
FROM composer:latest as vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist

# --- ESTÁGIO 2: Imagem Final ---
FROM php:8.2-apache

# Dependências do sistema
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev zip unzip git curl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Extensões PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Ativar Apache Rewrite
RUN a2enmod rewrite

WORKDIR /var/www/html

# Copiar apenas o código fonte (ignorando o que não precisa)
COPY . .

# Trazer a pasta vendor do estágio anterior
COPY --from=vendor /app/vendor ./vendor

# Gerar o autoload do composer agora com o código
RUN composer dump-autoload --optimize --no-dev

# Permissões (Crucial para o Laravel não dar erro 500)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Ajustar o Apache para a pasta /public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

EXPOSE 80