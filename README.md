### 🍕 Pizzaria Nhami

---

Integrantes
* Camila Vujanski de Lara
* Leticia Borges Cardoso
* João Marcelo dos Santos Oliveira
* Rhauan Dmengeon Ferraz Da Silva

---

### Descrição

O Pizzaria Nhami é um sistema web desenvolvido como projeto acadêmico para a disciplina de Desenvolvimento Back-End, com o objetivo de aplicar na prática os principais conceitos estudados durante o primeiro bimestre do curso utilizando o framework Laravel.
O sistema simula o funcionamento de uma pizzaria, permitindo que clientes se cadastrem, visualizem o cardápio, enquanto administradores gerenciam as categorias e pizzas disponíveis. A aplicação foi construída seguindo o padrão de arquitetura MVC (Model-View-Controller), utilizando PostgreSQL como banco de dados e o Laravel Breeze para autenticação de usuários.

## Durante o desenvolvimento, foram aplicados conceitos como:
Laravel - PHP - Banco de dados - MVC - Models - Migrations - Seeders - Controllers - Rotas - Views Blade - Eloquent ORM - CRUD - Relacionamentos - Laravel Breeze - Autenticação - Campo role - Middleware - Policies - Form Requests.

--- 

Clone o repositório e execute os comandos abaixo na raiz do projeto:

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
```

Configure o arquivo .env com os dados do seu banco PostgreSQL:

```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=pizzaria
DB_USERNAME=postgres
DB_PASSWORD=sua_senha
```

Depois, rode as migrations e os seeders para criar as tabelas e popular o banco com dados de exemplo:

```bash
php artisan migrate:fresh --seed
```

Execução

Compile os assets do front-end e inicie o servidor local:

npm run dev

Em outro terminal, inicie o servidor do Laravel:

```bash
php artisan serve
```

Acesse o sistema pelo navegador em:

```bash
http://localhost:8000
```

## Usuários para teste

Os usuários abaixo são criados automaticamente pelos Seeders ao rodar php artisan migrate:fresh --seed.

* Administrador

E-mail: admin@pizzaria.com  
Senha: adm123  
Permissões: gerenciar categorias e pizzas (criar, editar e excluir);  

* Cliente

E-mail: cliente@pizzaria.com  
Senha: cliente123  
Permissões: Apenas vizualições e "realizar" pedido;  

* Funcionario

E-mail: funcionario@pizzaria.com  
Senha: func123  
Permissões: vizualizar e editar pizzas;  
