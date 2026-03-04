# Web-Cadastros

Sistema CRUD completo para gerenciamento de usuários, clientes e produtos, integrado com um sistema de autenticação. Este é um projeto prático desenvolvido durante o curso técnico do SENAI para consolidar conhecimentos em desenvolvimento web backend e estruturação de banco de dados.

## 🚀 Funcionalidades

* **Autenticação Segura:** Sistema de login e logout para controle de acesso à plataforma (`login.php`, `logout.php`, `logado.php`).
* **Gestão de Usuários:** Cadastro e controle de administradores/usuários do sistema (`cadastro_usuario.php`).
* **Gestão de Clientes:** Interface para registrar e gerenciar informações de clientes (`cadastro_cliente.php`).
* **Gestão de Produtos:** Controle de catálogo de produtos (`cadastro_produto.php`).
* **Upload de Arquivos:** Estrutura preparada para recebimento e armazenamento de arquivos/imagens (diretório `uploads/`).

## 🛠️ Tecnologias Utilizadas

* **Backend:** PHP
* **Banco de Dados:** MySQL (scripts na pasta `sql/`)
* **Frontend:** HTML5 e CSS3 (pasta `css/`)

## ⚙️ Como Executar o Projeto

1. **Clone o repositório:**
   ```bash
   git clone [https://github.com/codebyaires/Web-Cadastros.git](https://github.com/codebyaires/Web-Cadastros.git)
Prepare o Ambiente Local: Certifique-se de ter um servidor local rodando (como XAMPP, WAMP ou Laragon).

Configure o Banco de Dados:

Acesse o seu gerenciador de banco de dados (ex: phpMyAdmin).

Crie um banco de dados para o projeto.

Importe o script de criação das tabelas localizado na pasta sql/.

Configure a Conexão:

Abra o arquivo conexao.php.

Altere as credenciais (host, usuário, senha e nome do banco de dados) para corresponderem ao seu ambiente local.

Acesse a Aplicação:

Mova a pasta do projeto para o diretório público do seu servidor (ex: pasta htdocs se estiver usando XAMPP).

Acesse pelo navegador: http://localhost/Web-Cadastros/login.php

👨‍💻 Autor
Desenvolvido por Victor Aires.

LinkedIn

GitHub
