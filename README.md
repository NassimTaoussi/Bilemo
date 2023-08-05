# BileMo

API Resources definition
For the sake of clarity, you will find below the list & description of available API resources.

Products
Products sold by BileMo (mobile phones, tablets, headphones and other accessories).


Client
A customer is someone who has been granted access to the BileMo API.

Users
A user is a physical person, someone who's purchased a product


## Downloading the project

If you would like to install this project on your computer, you will first need to clone the repo of this project using Git.

At the root of your project, you need to create a .env.local file (same level as .env) in which you need to configure the appropriate values for your blog to run. Specifically, you need to override the following variables :

```
APP_ENV=dev
APP_SECRET=233b94cdb58c4294b79aa747e347ab18
DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=8.0.32&charset=utf8mb4"
CORS_ALLOW_ORIGIN='^https?://(localhost|127\.0\.0\.1)(:[0-9]+)?$'
JWT_SECRET_KEY=%kernel.project_dir%/config/jwt/private.pem
JWT_PUBLIC_KEY=%kernel.project_dir%/config/jwt/public.pem
JWT_PASSPHRASE=a1ea4d5c234ce31104395bd132790d8203122363573b84ddc301e870ab16f992
```

## Requirements

- PHP 8.1.4 or above
- composer
- Download the Symfony CLI.
- Run this command will guide you in cases there are missing extensions or parameters you need to tweek on your machine

```
symfony check:requirements 
```

## Install dependencies
Before running the project, you need to run the following commands in order to install the appropriate dependencies.

```
composer install
```

## Create a database
Now let's create our database. This will use the DATABASE_URL you've provided in .env.local file.

```
php bin/console doctrine:database:create
```

## Generating the database schema

```
php bin/console doctrine:schema:update --force
```

## Load fixtures (initial dummy data)
```
php bin/console doctrine:fixtures:load
``` 

## Running the webserver
Now you should be ready to launch the dev webserver using

```
symfony server:start -d
```

## Start using the API

To see the documentation of the list of available endpoints go to this url

http://127.0.0.1:8000/api/docs