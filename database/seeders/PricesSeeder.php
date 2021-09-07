<?php

namespace Database\Seeders;

use App\Models\Prices;
use Illuminate\Database\Seeder;

class PricesSeeder extends Seeder
{
    public function run()
    {
        Prices::factory(6)->create();
    }
}
