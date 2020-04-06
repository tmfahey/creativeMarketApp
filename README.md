 Creative Market Example Free Trial Application


## About This Application

This application utilizes Laravel and Vue to generate a free trial request form. The form allows users to submit their email to get access to a free trial. The logic for providing this access is not implemented; however, this app does check if the email exists for a user in the database used. If an email exists in the database the user will be displayed a page stating this information. If not, the user will be directed to the Creative Market signup page - https://creativemarket.com/sign-up

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/7.x/installation)

Clone the repository

    git clone git@github.com:tmfahey/creativeMarketApp.git

Switch to the repo folder

    cd creativeMarketApp

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Install npm packages for building the vue application

    npm install

If modifications are ever made to the vue application, it must be rebuilt with

    npm build

Alternatively you can run the following command in a seperate terminal to rebuild the vue application whenever changes occur

    npm run watch

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:tmfahey/creativeMarketApp.git
    cd creativeMarketApp
    composer install
    cp .env.example .env
    php artisan key:generate
    npm install
    npm build

**TL;DR commands for building Vue application**    

    npm install
    npm build

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

**Populate the database with seed data with relationships which includes users. This can help you to quickly start testing the application.**

Open the DummyDataSeeder and set the property values as per your requirement

    database/seeds/UsersTableSeeder.php

Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh

## Testing the Application

Automatic tests have been written for this application and can be ran with phpunit when in the root directory:

- Run laravel tests with: `phpunit` aka `vendor/bin/phpunit`
- Run vue tests with: `npm test`

## Environment variables

- `.env` - Environment variables can be set in this file

## Expected Database Schema

The application expects a database containing a user table equivalent to the one provided by default laravel apps. This schema is as follows:

Database Schema
TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
)

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.
