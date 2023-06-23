## About Project

MusLaces is //////

### Stack

- **[PHP 8.2.7](https://www.php.net/)**
- **[Laravel 10.10](https://laravel.com/)**
- **[elFinder](https://github.com/barryvdh/laravel-elfinder)**
- **[AdminLTE](https://adminlte.io/)**

## Setup

### First of all you need to save archives with AdminLTE, elFinder code. Then
composer install

npm install

cp .env.example .env

#### Database Connection on .env

php artisan cache:clear

php artisan key:generate

#### First Time
php artisan migrate:fresh --seed

#### After first time migration
php artisan migrate

php artisan db:seed

php artisan storage:link

#### Run Backend Server by Terminal
php artisan serve

#### Run Frontend Server by Terminal
npm run dev
