## Install

**Start migrations:**

```shell
php bin/console doctrine:migrations:migrate
```

**Load fixtures:**

```shell
php bin/console doctrine:fixtures:load
```

## Usage

**Routes:**

```
/auth/signin --> Authenticate a user (or admin) using default values: admin@test.test:test123 or user@test.test:test123
/user        --> List all users and their actions (only ROLE_ADMIN)
/compagny    --> List all compagnies and their actions (only ROLE_ADMIN)
/customer    --> List all customers and their actions
```