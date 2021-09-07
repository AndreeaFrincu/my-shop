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
            OrderProductsSeeder::class,
            OrdersSeeder::class,
            PricesSeeder::class,
            ProductPricesSeeder::class,
            ProductsSeeder::class,
            UsersSeeder::class]);
    }
}
