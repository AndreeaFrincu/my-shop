<?php

namespace Database\Seeders;

use App\Models\ProductPrices;
use Illuminate\Database\Seeder;

class ProductPricesSeeder extends Seeder
{
    public function run()
    {
        ProductPrices::factory(6)->create();
    }
}
