<?php

namespace Database\Seeders;

use App\Models\OrderProducts;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AuthorsSeeder::class);
        $this->call(GenresSeeder::class);
        $this->call(OrderProductsSeeder::class);
        $this->call(OrdersSeeder::class);
        $this->call(PricesSeeder::class);
        $this->call(ProductPricesSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(UsersSeeder::class);
    }
}
