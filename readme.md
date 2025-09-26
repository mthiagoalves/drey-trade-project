# Drey Trade Project

Uma plataforma moderna de análise de negociações full-stack, construída com Laravel e Vue.js, projetada para visualizar dados de mercado e gerenciar portfólios de usuários.

-----

## 📖 Sobre o Projeto

O Drey Trade Project é uma aplicação web de código aberto projetada para fornecer a traders e investidores ferramentas poderosas para análise de mercado e gerenciamento de portfólio. Em um mercado financeiro cada vez mais complexo, ter acesso a dados em tempo real e ferramentas de visualização intuitivas é crucial. Este projeto visa democratizar o acesso a essas ferramentas, oferecendo uma plataforma robusta, segura e fácil de usar, construída sobre uma pilha de tecnologia moderna e escalável.

### ✨ Principais Recursos

  * 📈 **Visualização de Dados em Tempo Real:** Gráficos interativos para acompanhar os preços de ações e criptomoedas.
  * 💼 **Gerenciamento de Portfólio:** Adicione, acompanhe e gerencie seus investimentos pessoais.
  * 🔐 **Autenticação Segura:** Sistema de registro e login de usuários com base no Laravel Sanctum.
  * 📊 **Ferramentas de Análise Técnica:** Integração de indicadores de negociação comuns (RSI, MACD, etc.).
  * 📱 **Design Responsivo:** Experiência de usuário otimizada para desktop e dispositivos móveis.
  * 🔔 **Alertas de Preço:** Configure notificações para ser avisado quando um ativo atingir um preço-alvo.

### 📸 Capturas de Tela

-----

## 🛠️ Pilha de Tecnologias

Este projeto foi construído utilizando as seguintes tecnologias e ferramentas. É crucial garantir que seu ambiente de desenvolvimento atenda a estes requisitos de versão para evitar problemas de compatibilidade.

| Componente | Tecnologia / Especificação | Versão Requerida |
| ----------------- | -------------------------- | ---------------- |
| Framework Backend | Laravel | `^12.0` |
| Framework Frontend| Vue.js | `^3.4.0` |
| Adaptador Server-Side | Inertia.js (Laravel) | `^1.0` |
| Adaptador Frontend | Inertia.js (Vue 3) | `^1.0` |
| Linguagem (Backend)| PHP | `^8.3` |
| Gerenciador de Pacotes | Composer | `^2.7` |
| Gerenciador de Pacotes | Node.js / npm | `^20.x` / `^10.x`|
| Banco de Dados | MySQL | `^8.0` |
| Bundler de Assets | Vite | `^5.0` |

-----

## 🚀 Começando

Siga estas instruções para configurar uma cópia do projeto em sua máquina local para desenvolvimento e testes.

### ✅ Pré-requisitos

Antes de começar, certifique-se de ter o seguinte software instalado:

  * PHP `^8.3`
  * Composer `^2.7`
  * Node.js `^20.x` e npm `^10.x`
  * MySQL `^8.0` (ou outro banco de dados compatível com o Laravel)
  * Git

### ⚙️ Instalação

1.  \*\*Clone o repositório:\*\*bash
    git clone [https://github.com/mthiagoalves/drey-trade-project.git](https://www.google.com/search?q=https://github.com/mthiagoalves/drey-trade-project.git)

    ```
    
    ```

2.  **Navegue até o diretório do projeto:**

    ```bash
    cd drey-trade-project
    ```

3.  **Instale as dependências do PHP:**

    ```bash
    composer install
    ```

4.  **Instale as dependências do Node.js:**

    ```bash
    npm install
    ```

5.  **Crie seu arquivo de ambiente `.env`:**

    ```bash
    cp.env.example.env
    ```

6.  **Gere uma nova chave de aplicação:**

    ```bash
    php artisan key:generate
    ```

7.  **Configure seu banco de dados:**
    Abra o arquivo `.env` e atualize as variáveis `DB_*` com as credenciais do seu banco de dados local.

8.  **Execute as migrações e popule o banco de dados:**

    ```bash
    php artisan migrate --seed
    ```

### ▶️ Rodando a Aplicação

Para rodar a aplicação em modo de desenvolvimento, você precisará de dois terminais.

1.  **Inicie o servidor backend do Laravel:**

    ```bash
    php artisan serve
    ```

2.  **Em um novo terminal, inicie o servidor de desenvolvimento do Vite:**

    ```bash
    npm run dev
    ```

A aplicação estará disponível em `http://127.0.0.1:8000`.

### 🧪 Rodando os Testes

Para executar a suíte de testes automatizados, use o seguinte comando:

```bash
php artisan test
```

-----

## 🗺️ Estrutura do Projeto

Uma visão geral rápida dos diretórios mais importantes:

  * `app/Http/Controllers/`: Lógica das requisições HTTP.
  * `database/migrations/`: Definições do schema do banco de dados.
  * `routes/web.php`: Definição das rotas da aplicação.
  * `resources/js/Pages/`: **Componentes de página do Vue.js (coração do frontend Inertia).**
  * `tests/`: Contém todos os testes automatizados.

-----

## 🤝 Contribuindo

Contribuições são o que tornam a comunidade de código aberto um lugar incrível para aprender, inspirar e criar. Qualquer contribuição que você fizer será **muito apreciada**.

Se você tiver uma sugestão para melhorar este projeto, por favor, faça um fork do repositório e crie um pull request. Você também pode simplesmente abrir uma issue com a tag "enhancement".

1.  Faça um Fork do Projeto
2.  Crie sua Feature Branch (`git checkout -b feature/AmazingFeature`)
3.  Faça o Commit de suas alterações (`git commit -m 'Add some AmazingFeature'`)
4.  Faça o Push para a Branch (`git push origin feature/AmazingFeature`)
5.  Abra um Pull Request

-----

## 📜 Licença

Distribuído sob a Licença MIT. Veja `LICENSE.txt` para mais informações.

-----

## 📧 Contato

Thiago Alves - [@mthiagoalves](https://www.google.com/search?q=https://instagram.com/mthiagoalves) - m.thiago.alves@live.com

Link do Projeto: [https://github.com/mthiagoalves/drey-trade-project](https://www.google.com/search?q=https://github.com/mthiagoalves/drey-trade-project)

```
```
