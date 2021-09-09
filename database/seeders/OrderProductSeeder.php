<?php

namespace Database\Seeders;

use App\Models\OrderProduct;
use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
    public function run()
    {
        OrderProduct::factory(6)->create();
    }
}
