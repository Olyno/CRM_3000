## Install

### Create database:

This project is using ``sqlite`` as database. Simply create a ``var/data.db`` file to make it works.

### Start migrations:

```shell
php bin/console doctrine:migrations:migrate
```

### Load fixtures:

```shell
php bin/console doctrine:fixtures:load
```

This command creates default datas in the database. This includes a default admin user:
  - **Email:** admin@test.test
  - **Password:** test123

And a default user:
  - **Email:** user@test.test
  - **Password:** test123

## Usage

### Routes:

```
/auth/signin     --> Authenticate a user (or admin) using default values: admin@test.test:test123 or user@test.test:test123
/logout          --> Logout the current user
/                --> The home page. You can create a new or edit an existing entity depend of your role
/user/new        --> Create new user (only ROLE_ADMIN)
/user/edit       --> Edit existing user (only ROLE_ADMIN)
/compagny/new    --> Create new compagny (only ROLE_ADMIN)
/compagny/edit   --> Edit existing compagny (only ROLE_ADMIN)
/customer/new    --> Create new customer
/customer/edit   --> Edit existing customer
```