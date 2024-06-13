<div align="center" id="top"> 
  <img src="./.github/app.gif" alt="Ambiente_de_desenvolvimentos_scs" />

  &#xa0;

  <!-- <a href="https://ambiente_de_desenvolvimentos_scs.netlify.app">Demo</a> -->
</div>

<h1 align="center">Desafio Técnico - Back-End Pleno</h1>

<p align="center">
  <img alt="Github top language" src="https://img.shields.io/github/languages/top/{{YOUR_GITHUB_USERNAME}}/ambiente_de_desenvolvimentos_scs?color=56BEB8">

  <img alt="Github language count" src="https://img.shields.io/github/languages/count/{{YOUR_GITHUB_USERNAME}}/ambiente_de_desenvolvimentos_scs?color=56BEB8">

  <img alt="Repository size" src="https://img.shields.io/github/repo-size/{{YOUR_GITHUB_USERNAME}}/ambiente_de_desenvolvimentos_scs?color=56BEB8">

  <img alt="License" src="https://img.shields.io/github/license/{{YOUR_GITHUB_USERNAME}}/ambiente_de_desenvolvimentos_scs?color=56BEB8">

  <!-- <img alt="Github issues" src="https://img.shields.io/github/issues/{{YOUR_GITHUB_USERNAME}}/ambiente_de_desenvolvimentos_scs?color=56BEB8" /> -->

  <!-- <img alt="Github forks" src="https://img.shields.io/github/forks/{{YOUR_GITHUB_USERNAME}}/ambiente_de_desenvolvimentos_scs?color=56BEB8" /> -->

  <!-- <img alt="Github stars" src="https://img.shields.io/github/stars/{{YOUR_GITHUB_USERNAME}}/ambiente_de_desenvolvimentos_scs?color=56BEB8" /> -->
</p>

<!-- Status -->

<!-- <h4 align="center"> 
	🚧  Ambiente_de_desenvolvimentos_scs 🚀 Under construction...  🚧
</h4> 

<hr> -->

<p align="center">
  <a href="#dart-about">About</a> &#xa0; | &#xa0; 
  <a href="#sparkles-features">Features</a> &#xa0; | &#xa0;
  <a href="#rocket-technologies">Technologies</a> &#xa0; | &#xa0;
  <a href="#white_check_mark-requirements">Requirements</a> &#xa0; | &#xa0;
  <a href="#checkered_flag-starting">Starting</a> &#xa0; | &#xa0;
  <a href="#memo-license">License</a> &#xa0; | &#xa0;
  <a href="https://github.com/{{YOUR_GITHUB_USERNAME}}" target="_blank">Author</a>
</p>

<br>

## :dart: Sobre o Projeto ##

Crie um sistema de gestão bancária por meio de uma API, composta por dois endpoints:
"/conta" e "/transacao". O endpoint "/conta" deve criar e fornecer informações sobre o número
da conta e o saldo. O endpoint "/transacao" será responsável por realizar diversas operações
financeiras..

## :rocket: Tecnologias ultilizadas ##

Ferramentas ultilizadas no projeto:

- [Laravel](https://laravel.com/docs/10.x)
- [Mysql](https://www.mysql.com/)
- [Docker](https://www.docker.com/)
- [MailHog](https://hub.docker.com/r/mailhog/mailhog/)

## :white_check_mark: Requirements ##

Para rodar o projeto, você vai precisar do docker [Docker](https://www.docker.com/).

## :checkered_flag: Subindo o ambiente de desenvolvimento ##

```bash
# Clone o projeto
$ git clone https://github.com/guilherf13/SCS_DevOps

# Executando o ambiente

$ cd desafio_tecnico_object
$ cd backend
$ cp .env.example .env
$ cd ../../
$ sudo chmod -R 777 desafio_tecnico_object
$ cd desafio_tecnico_object
$ docker compose up -d --build
$ docker exec -it backend composer install
$ docker exec -it backend php artisan key:generate
$ docker exec -it backend php artisan migrate

# Executando os testes

$ docker exec -it backend php artisan test --filter TransferenciaTest

# A aplicação esta rodando nas seguintes rotas:

# laravel <http://localhost:80>
# meilhog (http://localhost:8025>
# mysql port 3306
```
## Documentação das APIs

```http
  POST /conta
```
#### Registra uma nova conta

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `conta_id`  | Integer    | id da conta
| `valor`     | Decimal    | Valor inicial do Saldo
| **Rota:**   | URL http://localhost:80/api/conta

Exemplo de payload:

{
    "conta_id": 30,
    "valor": 500
}

Exemplo de response:

{
  "conta_id":30,
  "saldo":"500"
}

```http
  GET /conta/{conta_id}
```
#### Retorna os dados da conta

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `conta_id`  | Integer    | id da conta
| **Rota:**   | URL http://localhost:80/api/conta/{conta_id}

Exemplo de response:

{
  "conta_id":30,
  "saldo":"500.00"
}

```http
  POST /transferencia
```
#### Realiza uma nova compra

| Parâmetro         | Tipo       | Descrição                                   |
| :----------       | :--------- | :------------------------------------------ |
| `conta_id`        | Integer    | id da conta
| `valor`           | Decimal    | Valor a ser pago
| `forma_pagamento` | String     | Letra que corresponde ao tipo de pagamento. (Pix = P, Debito = D e Crédito = C).
| **Rota:**   | URL http://localhost:80/api/transferencia

Exemplo de payload:

{
    "conta_id": 30,
    "valor": 100
    "forma_pagamento": "P"
}

Exemplo de response:

{
  "conta_id":30,
  "saldo":"400"
}

## :memo: License ##

This project is under license from MIT. For more details, see the [LICENSE](LICENSE.md) file.


Made with :heart: by <a href="https://github.com/guilherf13" target="_blank">{{guilherme}}</a>

&#xa0;

<a href="#top">Back to top</a>
