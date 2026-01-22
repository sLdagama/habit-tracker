# Habit Tracker
Sistema de acompanhamento de hábitos simples e eficiente para ajudar você a monitorar e melhorar seus hábitos diários.

## 🚀 Como rodar o projeto (Modo Rápido)

Se você tem o Docker instalado, não precisa baixar o código fonte. Basta baixar o arquivo `compose.prod.yaml` e rodar:

```bash
# Sobe os contêineres
docker compose -f compose.prod.yaml up -d

# Cria as tabelas e dados de teste
docker compose -f compose.prod.yaml exec laravel.test php artisan migrate --seed
