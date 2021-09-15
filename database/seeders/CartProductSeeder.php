<?php

namespace Database\Seeders;

use App\Models\CartProduct;
use Illuminate\Database\Seeder;

class CartProductSeeder extends Seeder
{
    public function run()
    {
        CartProduct::factory(20)->create();
    }
}
