<?php

use Illuminate\Database\Seeder;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer_product_dollarsales')->insert([
            'customerName' => 'Euro+ Shopping Channel',
            'dollar_sales' => '820690',
        ]);

        DB::table('customer_product_dollarsales')->insert([
            'customerName' => 'Mini Gifts Distributors Ltd.',
            'dollar_sales' => '591827',
        ]);

        DB::table('customer_product_dollarsales')->insert([
            'customerName' => 'Australian Collectors, Co.',
            'dollar_sales' => '180585',
        ]);

        DB::table('customer_product_dollarsales')->insert([
            'customerName' => 'Muscle Machine Inc',
            'dollar_sales' => '177914',
        ]);

        DB::table('customer_product_dollarsales')->insert([
            'customerName' => 'La Rochelle Gifts',
            'dollar_sales' => '158573',
        ]);

        DB::table('customer_product_dollarsales')->insert([
            'customerName' => 'Dragon Souveniers, Ltd.',
            'dollar_sales' => '156251',
        ]);

        DB::table('customer_product_dollarsales')->insert([
            'customerName' => 'Down Under Souveniers, Inc',
            'dollar_sales' => '154622',
        ]);

        DB::table('customer_product_dollarsales')->insert([
            'customerName' => 'Land of Toys Inc.',
            'dollar_sales' => '149085',
        ]);

        DB::table('customer_product_dollarsales')->insert([
            'customerName' => 'AV Stores, Co.',
            'dollar_sales' => '148410',
        ]);

        DB::table('customer_product_dollarsales')->insert([
            'customerName' => 'The Sharp Gifts Warehouse',
            'dollar_sales' => '143536',
        ]);
    }
}
