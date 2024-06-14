# 📝 Teste Motoca Systems - Desenvolvedor Back-End

## 📄 Descrição

Bem-vindo ao teste de contratação para a vaga de Desenvolvedor Back-End. Neste teste, você terá a oportunidade de demonstrar suas habilidades em **PHP** com o framework **Laravel** e **PostgreSQL** ao criar uma API CRUD baseada em um conjunto de requisitos.

## :checkered_flag: Subindo o ambiente de desenvolvimento ##

```bash
# Clone o projeto
$ git clone https://github.com/guilherf13/teste-motocaSystems-backEnd.git

# Executando o ambiente

$ cd teste-motocaSystems-backEnd
$ cd backend
$ cp .env.example .env
$ cd ../../
$ sudo chmod -R 777 teste-motocaSystems-backEnd
$ cd teste-motocaSystems-backEnd
$ docker compose up -d --build
$ docker exec -it backend composer install
$ docker exec -it backend php artisan key:generate
$ docker exec -it backend php artisan migrate

A documentação completa da API pode ser encontrada no link abaixo:

[Documentação da API no Postman](https://documenter.getpostman.com/view/26874194/2sA3XQfLns)

## 🛠️ Funcionalidades

A aplicação deve incluir as seguintes operações CRUD para as entidades "Produtos" e "Categorias":

### Produtos

1. **Criar Produto:**
   - Rota: `POST /api/produtos`
   - Payload: `{ "nome": "Nome do Produto", "descricao": "Descrição do Produto", "preco": 100.00, "categoria_id": 1 }`
   
2. **Ler Produtos:**
   - Rota: `GET /api/produtos`
   - Retorna uma lista de todos os produtos.
   
3. **Ler Produto por ID:**
   - Rota: `GET /api/produtos/{id}`
   - Retorna os detalhes de um produto específico.
   
4. **Atualizar Produto:**
   - Rota: `PUT /api/produtos/{id}`
   - Payload: `{ "nome": "Nome do Produto", "descricao": "Descrição do Produto", "preco": 150.00, "categoria_id": 2 }`
   
5. **Deletar Produto:**
   - Rota: `DELETE /api/produtos/{id}`
   - Deleta um produto específico.

### Categorias

1. **Criar Categoria:**
   - Rota: `POST /api/categorias`
   - Payload: `{ "nome": "Nome da Categoria" }`
   
2. **Ler Categorias:**
   - Rota: `GET /api/categorias`
   - Retorna uma lista de todas as categorias.
   
3. **Ler Categoria por ID:**
   - Rota: `GET /api/categorias/{id}`
   - Retorna os detalhes de uma categoria específica.
   
4. **Atualizar Categoria:**
   - Rota: `PUT /api/categorias/{id}`
   - Payload: `{ "nome": "Nome da Categoria Atualizada" }`
   
5. **Deletar Categoria:**
   - Rota: `DELETE /api/categorias/{id}`
   - Deleta uma categoria específica.

### Relacionamento Produto-Categoria

- Cada produto pertence a uma categoria (`categoria_id` como chave estrangeira na tabela `produtos`).
- Cada categoria pode ter vários produtos.

## ⏰ Prazo

Você tem até **17/06/2024 às 08:00 horas** para completar este teste a partir do momento em que o recebe. Será levado em consideração a qualidade e o tempo de entrega do teste.

## 📦 Entrega

1. Após completar o teste, crie um repositório no seu GitHub com o nome **`teste-motocaSystems-backEnd`**.
2. Suba o código da aplicação para este repositório.
3. Inclua qualquer documentação adicional que julgar necessária.
4. Certifique-se de que o código está bem comentado e fácil de entender.
5. Envie o link do repositório para nós (thalles@motoca.com.br / welliton@motoca.com.br).

## 📞 Contato

Se você tiver qualquer dúvida durante o teste, sinta-se à vontade para entrar em contato conosco.

Boa sorte! 🍀