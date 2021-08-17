# Desafio Back-end Multiplier

## Passos para instalar o projeto

1. Baixar o projeto do github.
```bash
git clone https://github.com/alissonandrade2020/ApiPHPLaravelMYSQL.git
```

2. Entrar na pasta do projeto.
```bash
cd ApiPHPLaravelMYSQL
```

3. Instalar o projeto.
```bash
composer install
```

4. Criar o arquivo .env. Note que no final desse arquivo tem algumas variáveis pré-definidas que cuidarão da geração dos registros falsos. Sinta-se livre para alterá-los. 
```bash
cp .env.example .env
```
ex.:
```bash
MAX_USERS=50
MAX_BOARDS=30
MAX_DISHES=90
MAX_CLIENTS=2500
MAX_ORDERS=9000
```

1. **Criar o banco de dados** e inserir as credenciais no .env

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cardapios
DB_USERNAME=root
DB_PASSWORD=
```

6. Gerar a chave do projeto.
```bash
php artisan key:generate
```

7. Criar as tabelas e os *inserts* no banco de dados.
```bash
php artisan migrate --seed
```

8. Após o comando acima finalizar, Iniciar o servidor local. **Pode demorar alguns minutos.**
```bash
php artisan serve
```
<br>

<p align="center">
  <img src="https://multiplier.com.br/assets/multiplier.svg" width="320" alt="Nest Logo" />
</p>

# Desafio Back-end Multiplier

O intuito deste teste é avaliar seus conhecimentos técnicos de back-end.

O teste consiste em fazer um sistema para um restaurante.

Este desafio deve ser feito por você em sua casa. Gaste o tempo que você quiser, mas nos conte o tempo que levou para realizar o desafio.

# Instruções de entrega do desafio

1. Primeiro, faça um fork deste projeto para sua conta no Github (crie uma se você não possuir).
2. Em seguida, implemente o projeto conforme as instruções a seguir, em seu clone local.
3. Por fim, envie via e-mail com o link do desafio, avisando quanto tempo levou para faze-lo.

# Descrição do projeto

Precisamos que você crie uma API REST-FULL para a utilização de restaurante, que poderá ser utilizada para mobile ou um SPA.

**Sua aplicação DEVE:**

1. Fazer login funcionario(garçom):
- Deve apenas visualizar seus pedidos

2. Fazer login funcionario(cozinheiro).
- Deve visualizar todos os pedidos em andamento e há fazer

> Não precisa ter login cliente

3. Cadastro de Clientes (nome, CPF)
4. Fazer o cadastro das mesas do restaurante (número da mesa).
5. Fazer o cadastro de cardapios (cardapios com os itens do cardapio).
6. Fazer o pedido para a mesa do cliente.
7. Listar todos os pedidos (filtros: dia, semana, mês, por mesa, por cliente).
8. Listar pedidos em andamento, (para o garçom).
9. Listar pedidos há fazer e em andamento, (para o cozinheiro).
10. Listar por cliente, maior pedido, primeiro pedido, último pedido.

11. População de dados:
 - Deve possuir uma base com 10K clientes
 - 50 cardapios
 - 400K pedidos

> Dica: Utilize a biblioteca [faker](https://github.com/fakerphp/faker) para gerar os dados 😄

**Sua aplicação web NÃO PRECISA:**

1. Não precisa estar hospedada em nenhum servidor.
2. Testes unitários (pontos extras se fizer)
3. Testes integrados (pontos extras se fizer)

# Tecnologias que deve estar presentes no desafio

- Laravel (obrigatório)
- MySQL ou MariaDB
- PHP

**Não necessário mas se tiver será um diferencial**

- Testes Unitários
- Testes integrados

# Avaliação

Seu projeto será avaliado de acordo com os seguintes critérios.

1. Sua aplicação preenche os requerimentos básicos?
2. Você documentou a maneira de configurar o ambiente e rodar sua aplicação?
3. Você seguiu as instruções de envio do desafio?
4. Boas práticas RestFull
5. Boas práticas Laravel
6. Clean Code
7. SOLID
8. Performance consultas

Adicionalmente, tentaremos verificar sua experiência com programação funcional a partir da estrutura de seu projeto.

---

## Boa sorte!
