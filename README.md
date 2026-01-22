# 📉 Habit Tracker

Um sistema simples e eficiente para monitorar seus hábitos diários. Desenvolvido com **Laravel 11**, **MySQL** e **Docker**.

---

## 🚀 Como rodar o projeto (Modo Rápido)

Para testar o projeto sem precisar clonar todo o código-fonte ou configurar o PHP manualmente, você pode usar apenas o Docker.

### 1. Baixe o arquivo de configuração
Baixe o arquivo [**compose.prod.yaml**](./compose.prod.yaml) deste repositório e salve-o em uma pasta no seu computador.

> **Dica:** Se preferir via terminal, você pode baixar direto usando:
> `curl -O https://raw.githubusercontent.com/sLdagama/habit-tracker/main/compose.prod.yaml`

### 2. Suba o sistema
Abra o terminal na pasta onde salvou o arquivo e execute:

```bash
# Iniciar os contêineres
docker compose -f compose.prod.yaml up -d

# Criar o banco de dados e os dados de teste
docker compose -f compose.prod.yaml exec laravel.test php artisan migrate:fresh --seed

3. Acesso
O sistema estará disponível em: http://localhost:8080

4.
⚠️ Solução de Problemas (Windows)
Se ao rodar o comando você receber um erro de conexão (error during connect ou pipe/docker_engine), siga estes passos:

Abra o Docker Desktop: Certifique-se de que a "baleia" está verde e o status é Running.

Permissão de Administrador: Feche seu terminal (PowerShell ou CMD) e abra-o novamente clicando com o botão direito e selecionando "Executar como Administrador".

Verifique a conexão: Digite docker ps. Se aparecer uma lista (mesmo que vazia), o Docker está pronto para uso.