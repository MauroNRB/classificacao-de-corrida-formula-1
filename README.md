# Classificação de Corrida de Formula 1

## Pré Requisitos
MySQL: 5.7

---

## Pré requisitos

Criar uma tabela do banco de dados (MySQL) do tipo utf8mb4_general_ci com o nome de "formula1"

Em seguida rode os seguintes comandos

```properties
composer install --ignore-platform-reqs
php bin/console make:migration
php bin/console doctrine:migrations:migrate
php bin/console doctrine:schema:update --force
```


## Como executar?

```properties
symfony server:start
```

## Acessar sistema

Através da URL: http://localhost:8000/