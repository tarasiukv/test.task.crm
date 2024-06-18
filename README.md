<p align="center"><a href="https://www.zoho.com/crm/" target="_blank"><img src="public/img/1.png" width="400" alt="CRM Logo"><img src="public/img/2.png" width="400" alt="CRM Logo"></a></p>


## Test task for Zoho

### Content

- **[Instalation](#installation)**
- **[Run](#run)**
- **[Issue](#issue)**


# Installation

#### Make sure you are in the directory with the files: `.env` and `composer.json` ####

- Make changes in the `.env` file


- Install all dependencies:
  `npm install`


- Install composer: `composer install`


- Generate key: `php artisan key:generate`


- Run migrate: `php artisan migrate`


- Build project: `npm run build`


## Run project

Simple way to run server: 

    php artisan serve

On the server has to be run Echo server. For run use command:

    laravel-echo-server start

Also there has to be run workers:

    php artisan queue:work

For build all front code run:

    npm run build


# Issue


