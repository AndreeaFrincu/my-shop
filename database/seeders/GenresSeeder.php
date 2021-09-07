<?php

namespace Database\Seeders;

use App\Models\Genres;
use Illuminate\Database\Seeder;

class GenresSeeder extends Seeder
{

    public function run()
    {
        Genres::factory(10)->create();
    }
}
