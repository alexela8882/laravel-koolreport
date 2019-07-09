<?php
namespace App\Reports;

use \koolreport\processes\Group;
use \koolreport\processes\Sort;
use \koolreport\processes\Limit;

class SalesByCustomer extends \koolreport\KoolReport
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

        $this->src('mysql')  // use any of your preferred connection type in config/database.php
        ->query("SELECT customerName, dollar_sales FROM customer_product_dollarsales")
        ->pipe(new Group(array(
            "by"=>"customerName",
            "sum"=>"dollar_sales"
        )))
        ->pipe(new Sort(array(
            "dollar_sales"=>"desc"
        )))
        ->pipe(new Limit(array(10)))
        ->pipe($this->dataStore('sales_by_customer'));
    }
}