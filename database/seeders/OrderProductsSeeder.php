<?php

namespace Database\Seeders;

use App\Models\OrderProducts;
use Illuminate\Database\Seeder;

class OrderProductsSeeder extends Seeder
{
    public function run()
    {
        OrderProducts::factory(6)->create();
    }
}
