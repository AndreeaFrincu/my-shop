<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AuthorSeeder::class,
            GenreSeeder::class,
            ProductSeeder::class,
            PriceSeeder::class,
            ProductPriceSeeder::class,
            UserSeeder::class,
            OrderSeeder::class,
            OrderProductSeeder::class]);
    }
}
