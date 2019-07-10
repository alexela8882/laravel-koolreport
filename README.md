# laravel-koolreport
Koolreport for Laravel.

## Resources

[koolreport/core](https://github.com/koolreport/core) / [koolreport.com](https://www.koolreport.com/)

## Getting started

### Clone the repo
`$ git clone https://github.com/alexela8882/laravel-koolreport.git`

### Install dependencies
`$ composer install`

### Copy `.env` file
`$ php -r "copy('.env.example', '.env');"`

### Generate key
`$ php artisan key:generate`

## Configuring Backend / Seeding data
Update your `.env` file and run `php artisan migrate`

You should also update your `config/database.php` for connection setup used by koolreport. See file [MyReport.php](/app/Reports/MyReport.php)

Run `php artisan db:seed` to load all data

## Done

Access your report by running `php artisan serve` and go to [localhost:8000/home](http://localhost:8000/home) or [localhost:8000/sales](http://localhost:8000/sales)

# Deploying in existing project

### Install kool-report

`cd` into your project then run `composer install koolreport/core koolreport/laravel koolreport/bootstrap4`

### Creating report

Create your first report by creating `Reports` folder inside your laravel's `app` folder.
Then create two files `MyReport.php` and `MyReport.view.php`.

**MyReport.php**
```
<?php
namespace App\Reports;
class MyReport extends \koolreport\KoolReport
{
    use \koolreport\laravel\Friendship;
    use \koolreport\bootstrap4\Theme;
    // By adding above statement, you have claim the friendship between two frameworks
    // As a result, this report will be able to accessed all databases of Laravel
    // There are no need to define the settings() function anymore
    // while you can do so if you have other datasources rather than those
    // defined in Laravel.
    function setup () {
        // Let say, you have "sale_database" is defined in Laravel's database settings.
        // Now you can use that database without any futher setitngs.
        
        
        $this->src("mysql") // use any of your preferred connection type in config/database.php
        ->query("SELECT * FROM users")
        ->pipe($this->dataStore("users")); 
    }
}
```

**MyReport.view.php**
```
<?php
use \koolreport\widgets\koolphp\Table;
?>
<html>
    <head>
    <title>My Report</title>
    </head>
    <body>
        <h1>It works</h1>
        <?php
        Table::create([
            "dataSource"=>$this->dataStore("users")
        ]);
        ?>
    </body>
</html>
```

**HomeController.php**

If you don't have `HomeController` open your terminal and run `php artisan make:controller HomeController`. Or you can use any `controller` you prefer then copy this code:

```
<?php

namespace App\Http\Controllers;
use App\Reports\MyReport;

class HomeController extends Controller
{
    public function __contruct () {
        $this->middleware("guest");
    }
    public function index () {
        $report = new MyReport;
        $report->run();
        return view("report",["report"=>$report]);
    }
}
```

**report.blade.php**

Create `report.blade.php` into your `resources/views` folder then add this code:

```
<?php $report->render(); ?>
```

### Update route

Update your route in `web.php`.

```
Route::get('/home', 'HomeController@index')->name('home');
```

Run `php artisan serve` then access `locahost:8000/home`

You should now see the list of users from your database.
If not, check your `config/database.php` and update the `mysql` connection type.
