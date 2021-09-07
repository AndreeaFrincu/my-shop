<?php

namespace Database\Seeders;

use App\Models\Authors;
use Illuminate\Database\Seeder;

class AuthorsSeeder extends Seeder
{

    public function run()
    {
        Authors::factory(3)->create();
    }
}
