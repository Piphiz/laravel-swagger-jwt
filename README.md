# Projeto API Laravel
Este projeto é uma API desenvolvida em Laravel com autenticação JWT e documentação gerada com Swagger.

<p align="center">
    <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel Logo" width="80"/>
    <img src="https://upload.wikimedia.org/wikipedia/commons/a/ab/Swagger-logo.png" alt="Swagger Logo" width="80"/>
    <img src="https://jwt.io/img/pic_logo.svg" alt="JWT Logo" width="80"/>
</p>


## Pré-requisitos

- PHP 8.x
- Composer
- MySQL ou outro banco de dados compatível
- Laravel 11.x
- Extensões do PHP: OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON
- JWT para autenticação
- Swagger para documentação da API

## Instalação

1. Clone este repositório:

    ```bash
    git clone https://github.com/seu-usuario/seu-repositorio.git
    ```

2. Instale as dependências:

    ```bash
    composer install
    ```

3. Copie o arquivo `.env`:

    ```bash
    cp .env.example .env
    ```

4. Configure o arquivo `.env` com as informações do seu banco de dados.

5. Gere a chave da aplicação:

    ```bash
    php artisan key:generate
    ```

6. Execute as migrações para criar as tabelas:

    ```bash
    php artisan migrate
    ```

7. Execute os seeders para gerar dados iniciais:

    ```bash
    php artisan db:seed
    ```

8. Gere a documentação Swagger:

    ```bash
    php artisan l5-swagger:generate
    ```

9. Inicie o servidor:

    ```bash
    php artisan serve
    ```

## Autenticação

Para acessar as rotas protegidas, você precisa fazer login com o usuário administrador padrão:

- **Email:** admin@admin.com
- **Senha:** Admin123

Após o login, você receberá um token Bearer que deve ser utilizado nas requisições às rotas protegidas. Para isso, inclua o token no cabeçalho da requisição:

```bash
     Authorization: Bearer SEU_TOKEN_AQUI
```

## Acessando os Comercios

```bash
     GET http://localhost:8000/api/comercios
```

## Documentação da API

A documentação da API está disponível no Swagger. Após iniciar o servidor, acesse a URL:

```bash
http://localhost:8000/api/documentation
```
