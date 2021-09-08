<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AuthorsSeeder::class,
            GenresSeeder::class,
            ProductsSeeder::class,
            PricesSeeder::class,
            ProductPricesSeeder::class,
            UsersSeeder::class,
            OrdersSeeder::class,
            OrderProductsSeeder::class]);
    }
}
