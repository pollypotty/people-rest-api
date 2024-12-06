Application setup:

requirements: PHP, Composer, MySQL

- `git clone <repository-url>`
- create .env in project root, add: DB_DATABASE, DB_USERNAME, DB_PASSWORD
- create database on local mysql server with the name given in .env
- `composer install`
- `php artisan key:generate`
- `php artisan migrate --seed`
- `php artisan serve`

By default the server runs on port 8000.
