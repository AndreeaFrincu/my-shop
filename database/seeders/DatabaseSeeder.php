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
            UserSeeder::class,
            OrderSeeder::class,
            CartSeeder::class,
            ProductPriceSeeder::class,
            CartProductSeeder::class,
            OrderProductSeeder::class]);
    }
}
