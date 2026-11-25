## 🍽️ Projeto Cozinha

## 📌 Sobre o projeto

O Projeto Cozinha é um sistema desenvolvido com Laravel que tem como objetivo facilitar o gerenciamento das atividades relacionadas à cozinha escolar, permitindo o controle de alunos, funcionários, alimentos, estoque, turmas e desperdícios.

O sistema possui uma API REST responsável pelo cadastro, consulta, atualização e exclusão de informações, além de mecanismos de autenticação para alunos e funcionários.

## 🎯 Objetivo (MVP)

- Realizar o cadastro e gerenciamento de alunos.
- Realizar o cadastro e gerenciamento de funcionários.
- Implementar autenticação de alunos e funcionários.
- Gerenciar alimentos e suas informações.
- Controlar o estoque de alimentos.
- Registrar e acompanhar desperdícios alimentares.
- Gerenciar turmas escolares.
- Disponibilizar dados por meio de uma API REST.

## 🚀 Tecnologias utilizadas

- **PHP** – Linguagem de programação.
- **Laravel** – Framework utilizado no desenvolvimento do sistema.
- **MySQL** – Banco de dados.
- **HTML e CSS** – Estrutura e estilização das páginas.
- **JavaScript** – Funcionalidades e interações do sistema.

## 📲 Funcionalidades

### 👨‍🎓 Gerenciamento de alunos
- Cadastro de alunos.
- Consulta individual de alunos.
- Listagem completa de alunos.
- Listagem simplificada.
- Alteração de informações.
- Exclusão de alunos.
- Autenticação e logout.

### 👨‍💼 Gerenciamento de funcionários
- Cadastro de funcionários.
- Consulta individual.
- Listagem de funcionários.
- Listagem simplificada.
- Alteração de informações.
- Exclusão de funcionários.
- Autenticação e logout.
- Armazenamento de imagens de funcionários.

### 🥗 Gerenciamento de alimentos
- Cadastro de alimentos.
- Consulta individual.
- Listagem de alimentos.
- Listagem simplificada.
- Alteração de informações.
- Exclusão de alimentos.

### 📦 Controle de estoque
- Cadastro de itens no estoque.
- Consulta de registros.
- Listagem completa e simplificada.
- Atualização de informações.
- Exclusão de registros.
- Controle de quantidade.
- Registro de datas de fabricação e validade.
- Associação dos alimentos aos funcionários responsáveis.

### ♻️ Controle de desperdícios
- Registro de desperdícios.
- Registro por período (manhã, almoço e tarde).
- Registro dos motivos do desperdício.
- Consulta e listagem de registros.
- Alteração e exclusão de informações.

### 🏫 Gerenciamento de turmas
- Cadastro de turmas.
- Consulta individual.
- Listagem completa e simplificada.
- Alteração e exclusão de registros.

### 🔐 Autenticação e segurança
- Login de alunos e funcionários.
- Geração de tokens de autenticação.
- Validação de tokens por meio de middlewares.
- Controle de validade dos tokens.
- Logout e exclusão dos tokens utilizados.

## ⚙️ Como executar o projeto

### Pré-requisitos

Antes de executar o projeto, é necessário possuir:

- PHP 8.3 ou superior.
- Composer.
- Node.js e NPM.
- Banco de dados SQLite ou MySQL.

### 1. Clonar o repositório

```bash
git clone https://github.com/vitinferreira3022-pixel/projeto_cozinha.git
```

### 2. Acessar a pasta do projeto

```bash
cd projeto_cozinha
```

### 3. Instalar as dependências PHP

```bash
composer install
```

### 4. Configurar o arquivo de ambiente

Copie o arquivo `.env.example` e crie um arquivo chamado `.env`.

No Windows (PowerShell):

```powershell
Copy-Item .env.example .env
```

### 5. Gerar a chave da aplicação

```bash
php artisan key:generate
```

### 6. Configurar o banco de dados

O projeto possui SQLite como configuração padrão no arquivo `.env.example`.

Crie o arquivo do banco de dados, caso ainda não exista:

```powershell
New-Item database/database.sqlite -ItemType File
```

Depois, execute as migrations:

```bash
php artisan migrate
```

Caso utilize MySQL, configure as informações de conexão no arquivo `.env` antes de executar as migrations.

### 7. Instalar as dependências do front-end

```bash
npm install
```

### 8. Iniciar o projeto

Execute o servidor Laravel:

```bash
php artisan serve
```

Para compilar os arquivos front-end durante o desenvolvimento, execute em outro terminal:

```bash
npm run dev
```

O sistema estará disponível em:

http://127.0.0.1:8000

## 🔌 Integração com API

A aplicação possui uma API REST desenvolvida em Laravel, responsável por realizar operações de cadastro, consulta, atualização e exclusão de dados.

**URL base da API:**

```text
http://127.0.0.1:8000/api
```

### 📡 Endpoints disponíveis

#### Funcionários

| Método | Endpoint | Descrição |
|---|---|---|
| POST | `/funcionario_cadastro` | Cadastrar funcionário |
| GET | `/ver_funcionario` | Consultar funcionário |
| GET | `/listar_funcionarios` | Listar funcionários |
| GET | `/listar_funcionarios_simples` | Listagem simplificada |
| PUT | `/alterar_funcionario` | Alterar funcionário |
| DELETE | `/deletar_funcionario` | Excluir funcionário |
| POST | `/login` | Realizar login |
| POST | `/logout_funcionario` | Realizar logout |

#### Alunos

| Método | Endpoint | Descrição |
|---|---|---|
| POST | `/salvar_aluno` | Cadastrar aluno |
| GET | `/ver_aluno` | Consultar aluno |
| GET | `/listar_alunos` | Listar alunos |
| GET | `/listar_alunos_simples` | Listagem simplificada |
| PUT | `/alterar_aluno` | Alterar aluno |
| DELETE | `/deletar_aluno` | Excluir aluno |
| POST | `/login_aluno` | Realizar login |
| POST | `/logout_aluno` | Realizar logout |

#### Alimentos

| Método | Endpoint | Descrição |
|---|---|---|
| POST | `/salvar_alimento` | Cadastrar alimento |
| GET | `/ver_alimento` | Consultar alimento |
| GET | `/listar_alimentos` | Listar alimentos |
| GET | `/listar_alimentos_simples` | Listagem simplificada |
| PUT | `/alterar_alimento` | Alterar alimento |
| DELETE | `/deletar_alimento` | Excluir alimento |

#### Estoque

| Método | Endpoint | Descrição |
|---|---|---|
| POST | `/salvar_estoque` | Cadastrar item no estoque |
| GET | `/ver_estoque` | Consultar estoque |
| GET | `/listar_estoques` | Listar estoques |
| GET | `/listar_estoques_simples` | Listagem simplificada |
| PUT | `/alterar_estoque` | Alterar estoque |
| DELETE | `/deletar_estoque` | Excluir registro |

#### Desperdícios

| Método | Endpoint | Descrição |
|---|---|---|
| POST | `/salvar_desperdicio` | Registrar desperdício |
| GET | `/ver_desperdicio` | Consultar desperdício |
| GET | `/listar_desperdicios` | Listar desperdícios |
| GET | `/listar_desperdicios_simples` | Listagem simplificada |
| PUT | `/alterar_desperdicio` | Alterar registro |
| DELETE | `/deletar_desperdicio` | Excluir registro |

#### Turmas

| Método | Endpoint | Descrição |
|---|---|---|
| POST | `/salvar_turma` | Cadastrar turma |
| GET | `/ver_turma` | Consultar turma |
| GET | `/listar_turmas` | Listar turmas |
| GET | `/listar_turmas_simples` | Listagem simplificada |
| PUT | `/alterar_turma` | Alterar turma |
| DELETE | `/deletar_turma` | Excluir turma |

#### Autenticação adicional

| Método | Endpoint | Descrição |
|---|---|---|
| GET | `/user` | Consultar usuário autenticado pelo Sanctum |

**Observação:** os endpoints acima são relativos à URL base `/api`. Algumas requisições possuem proteção por middleware, exigindo informações de autenticação. A documentação das rotas indica quais operações possuem essa proteção.

### 🔐 Autenticação da API

A API possui autenticação específica para alunos e funcionários.

Após realizar o login, o sistema gera um token associado ao usuário, com validade de até 7 dias.

Os middlewares responsáveis pela autenticação verificam:

- Existência do token.
- Identificação do aluno ou funcionário.
- Correspondência entre o token e o usuário.
- Validade do token.

Quando o token é inválido ou expirado, a API retorna uma mensagem informando o problema.

## 📂 Estrutura do projeto


projeto_cozinha/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AlunoController.php
│   │   │   ├── FuncionarioController.php
│   │   │   ├── AlimentoController.php
│   │   │   ├── EstoqueController.php
│   │   │   ├── DesperdicioController.php
│   │   │   └── TurmaController.php
│   │   │
│   │   └── Middleware/
│   │       ├── AlunoApiMiddleware.php
│   │       └── FuncionarioApiMiddleware.php
│   │
│   └── Models/
│
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   ├── factories/
│   └── seeders/
│
├── public/
├── resources/
│   └── views/
│
├── routes/
│   ├── api.php
│   └── web.php
│
├── storage/
├── tests/
│
├── .env.example
├── artisan
├── composer.json
├── package.json
├── vite.config.js
└── README.md
```

### Organização dos principais diretórios

- **app/Http/Controllers:** contém os controllers responsáveis pelas operações do sistema.
- **app/Http/Middleware:** contém os middlewares responsáveis pela validação de autenticação.
- **app/Models:** contém os modelos responsáveis pela comunicação com o banco de dados.
- **database/migrations:** contém as migrações responsáveis pela estrutura do banco.
- **resources/views:** contém as páginas e interfaces do sistema.
- **routes/api.php:** contém as rotas da API REST.
- **routes/web.php:** contém as rotas das páginas web.
- **storage:** utilizado para armazenar arquivos e dados gerados pela aplicação.
- **tests:** diretório destinado aos testes automatizados.

## 📄 Documentação completa

- 📘 **Documentação do projeto: https://docs.google.com/document/d/1Ma0TwlG8Gtjjp4FfdT_J_0n2BtGHBvu77pwGVowvtsg/edit?usp=sharing
- 📬 **Documentação da API (Postman): https://documenter.getpostman.com/view/58957590/2sBYHSyLsa
- 🎨 **Protótipo (Figma): [Adicionar link]
- 📊 **Organização das tarefas (Trello): [Adicionar link]
- 💻 **Repositório GitHub: https://github.com/vitinferreira3022-pixel/projeto_cozinha

## 👨‍💻 Autor

Victor Hugo de Barros Almeida Ferreira

GitHub: [@vitinferreira3022-pixel](https://github.com/vitinferreira3022-pixel)

---

Desenvolvido como projeto acadêmico, com o objetivo de aplicar conhecimentos de desenvolvimento web, programação, banco de dados e integração de APIs.