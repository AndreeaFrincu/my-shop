<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GenresSeeder extends Seeder
{
    public function run()
    {
        Genre::factory(10)->create();
    }
}
