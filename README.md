# Crud de veículos

## Descrição
Crud de veículos com o Laravel 9 com o Breeze e TailwindCSS, utilizando o Sail para rodar o projeto em um container Docker.

## Instalação
- O único pré-requisito é ter o Docker instalado.
- Após isso é só seguir os passos abaixo:
  - Clone o repositório
  - Rode o comando a seguir para instalar as dependências do projeto e o Sail:
    ```bash
    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd):/var/www/html" \
        -w /var/www/html \
        laravelsail/php81-composer:latest \
        composer install --ignore-platform-reqs
    ```
  - Copie o arquivo `.env.example` para `.env`, pode utilizar o comando `cp .env.example .env` para tal.
  - Rode o comando `./vendor/bin/sail up -d` para subir o container
  - Rode o comando `./vendor/bin/sail artisan key:generate` para gerar a chave da aplicação
  - Rode o comando `./vendor/bin/sail artisan migrate` para criar as tabelas
  - Rode o comando `./vendor/bin/sail artisan db:seed` para popular as tabelas
  - Rode o comando `./vendor/bin/sail npm install` para instalar as dependências do Node
  - Rode o comando `./vendor/bin/sail npm run dev` para compilar os assets
  - Após isso o projeto estará pronto para ser acessado em `http://localhost`
  - Para parar o container basta rodar o comando `./vendor/bin/sail down`

## Acesso
- Acesse  `http://localhost` para acessar o projeto
- Acesse `http://localhost/register` para criar um usuário ou `http://localhost/login` para logar com um usuário já criado
  - O seed cria um usuário com o email `test@example.com` e a senha `password`, dez carros e 3 manutenções agendadas, mas você pode criar um novo usuário. O arquivo de seed pode ser visto [aqui](database/seeders/DatabaseSeeder.php).


## Rotas
O projeto usa uma API REST para fazer as requisições, então todas as rotas estão no arquivo `routes/web.api`, para acessar as rotas, é necessário estar logado. As rotas são:
- `/vehicles` - Para listar os veículos
- `/maintenances` - Para listar as manutenções
- `/dashboard/` - Para listar as manutenções agendadas nos próximos 30 dias

## Observações
- O `.env` está configurado para utilizar os endereços dos containers do Docker, caso use outro endereço, é necessário alterar o arquivo, as rotas para "localhost" estão comentadas.
- Caso não consiga acessar o projeto compilado após rodar o comando `./vendor/bin/sail npm run dev`, altere o arquivo `vite.config.js`, removendo `hmr: {host: 'localhost',},` e descomentando `host: 'localhost'` ou deixe `server{}` vazio.
- É possível alterar o `docker-compose.yml` livremente, mas caso queira alterar os dockerfiles, utilize o comando `./vendor/bin/sail artisan sail:publish` para publicar os arquivos e altere os arquivos na pasta `docker` criada. Após isso, é necessário rodar o comando `./vendor/bin/sail build --no-cache` para reconstruir os containers.

