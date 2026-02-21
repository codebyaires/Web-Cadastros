# 📋 Sistema de Cadastros Web (CRUD)

Projeto prático desenvolvido durante o curso Técnico em Desenvolvimento de Sistemas no SENAI. Trata-se de um sistema web com área restrita para o gerenciamento e cadastro de usuários, clientes e produtos.

## 💡 Sobre o Projeto

A estrutura inicial, a arquitetura base do código e o fluxo de login foram fornecidos pelo professor da disciplina como ponto de partida. A partir dessa fundação, atuei na expansão do sistema, implementando novas entidades e a persistência de dados.

**Minhas principais contribuições e desenvolvimentos:**
* **Expansão do Sistema:** Adaptação da lógica do `cadastro_usuario.php` para o desenvolvimento integral das páginas `cadastro_cliente.php` e `cadastro_produto.php`.
* **Modelagem de Banco de Dados:** Criação das tabelas de Clientes e Produtos no banco de dados MySQL, definindo os tipos de dados adequados (como CPF, Endereço, etc).
* **Integração Back-end:** Construção e execução das queries SQL (comandos `INSERT` e `SELECT`) no PHP para gravar as informações preenchidas nos formulários diretamente no banco e listá-las na interface.
* **Ajustes de Interface:** Adaptação dos formulários HTML utilizando Tailwind CSS para receber os novos campos específicos de cada entidade.

## 🛠️ Tecnologias Utilizadas

* **Front-end:** HTML5, CSS3, Tailwind CSS (via CDN)
* **Back-end:** PHP
* **Banco de Dados:** MySQL (integração via `mysqli`)

## ⚙️ Funcionalidades

- [x] Sistema de Login e Autenticação (Área restrita / `session_start`).
- [x] Cadastro e Listagem de Usuários.
- [x] Cadastro e Listagem de Clientes (com validação de e-mail único).
- [x] Cadastro e Listagem de Produtos.

## 🚀 Como rodar o projeto localmente

1. Certifique-se de ter um servidor local instalado (como XAMPP, WAMP ou Laragon).
2. Clone este repositório na pasta raiz do seu servidor (`htdocs` ou `www`):
   ```bash
   git clone [https://github.com/SEU_USUARIO/NOME_DO_REPOSITORIO.git](https://github.com/SEU_USUARIO/NOME_DO_REPOSITORIO.git)
