<?php

namespace Database\Seeders;

use App\Models\ProductPrice;
use Illuminate\Database\Seeder;

class ProductPriceSeeder extends Seeder
{
    public function run()
    {
        ProductPrice::factory(6)->create();
    }
}
