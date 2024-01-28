## API BÁSICA COM AUTENTICAÇÃO
> API RESTful com autenticação JWT e CRUD de usuários.

Desenvolvido com [Laravel 10.x](https://laravel.com/).

A documentação de uso da API está disponível no [POSTMAN](https://documenter.getpostman.com/view/9336516/2s9YyqihVK)

## Requisitos

- [x] PHP 8.3
- [x] Laravel 10.x
- [x] MySQL 8.x
- [x] JWT

## Funcionalidades

- [x] Autenticação JWT
- [x] CRUD de usuários

## Instalação

### 1. Clonar o repositório

```bash
git clone git@github.com:menezedouglas/baseAuth.api.git
```

### 2. Instalar as dependências

```bash
composer install
```

### 3. Configurar o arquivo .env

Criar uma cópia do arquivo .env.example e renomear para .env

```bash
cp .env.example .env
```

Configurar o arquivo .env com as informações do banco de dados

```bash
DB_CONNECTION=mysql
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

### 4. Gerar a chave da aplicação

```bash
php artisan key:generate
```

### 5. Criar as tabelas no banco de dados e popular com dados fake

```bash
php artisan migrate --seed
```

### 6. Iniciar o servidor

```bash
php artisan serve
```

> Se preferir pode utilizar o [Docker](https://docker.com/) com o [Laradock](https://laradock.io/) ou [Laravel Sail](https://laravel.com/docs/10.x/sail)
> para criar o ambiente de desenvolvimento.
