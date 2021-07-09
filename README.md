<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About the project

PHP version: 7.3.24

Database: Mysql 5.7


## Running the project

First you'll need to install dependencies by running:
- ``$ composer install``
- ``$ npm install``

Then start the database server using docker:

``$ docker run -d -p 3306:3306 --name mysql-db -e MYSQL_ROOT_PASSWORD=password mysql:5.7
``

Create a database called "register"

Copy the ".env.example" file and pate it as ".env"

Then generate a new app key:

``$ php artisan key:generate``

Run migrations

``$ php artisan migrate``

Then compile the project assets and serve:
- ``$ npm run production``
- ``$ php artisan serve``
