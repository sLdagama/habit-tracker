# 📉 Habit Tracker

Um sistema simples e eficiente para monitorar seus hábitos diários. Desenvolvido com **Laravel 11**, **MySQL** e **Docker**.

---

## 🚀 Como rodar o projeto (Modo Rápido)

Para testar o projeto sem precisar clonar todo o código-fonte ou configurar o PHP manualmente, você pode usar apenas o Docker.

### 1. Baixe o arquivo de configuração
Baixe o arquivo [**compose.prod.yaml**](./compose.prod.yaml) deste repositório e salve-o em uma pasta no seu computador.

> **Dica:** Se preferir via terminal, você pode baixar direto usando:
> `curl -O https://raw.githubusercontent.com/seu-usuario/habit-tracker/main/compose.prod.yaml`

### 2. Suba o sistema
Abra o terminal na pasta onde salvou o arquivo e execute:

```bash
# Iniciar os contêineres
docker compose -f compose.prod.yaml up -d

# Criar o banco de dados e os dados de teste
docker compose -f compose.prod.yaml exec laravel.test php artisan migrate:fresh --seed

3. Acesso
O sistema estará disponível em: http://localhost:8080