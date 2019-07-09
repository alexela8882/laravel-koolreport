# laravel-koolreport
Koolreport for Laravel.

# Resources

[koolreport/core](https://github.com/koolreport/core) / [koolreport.com](https://www.koolreport.com/)

# Getting started

### Git clone the repo
`$ git clone https://github.com/alexela8882/laravel-koolreport.git`

### Install dependencies
`$ composer install`

### Copy `.env` file
`$ php -r "copy('.env.example', '.env');"`

### Generate key
`$ php artisan key:generate`

# Configuring Backend / Seeding data
Update your `.env` file and run `php artisan migrate`

You should also update your `config/database.php` for connection setup used by koolreport. See file [MyReport.php](/app/Reports/MyReport.php)

Run `php artisan db:seed` to load all data

# Done

Access your report by running `php artisan serve` and go to [localhost:8000/home](http://localhost:8000/home) or [localhost:8000/sales](http://localhost:8000/sales)
