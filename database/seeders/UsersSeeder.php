<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        Users::factory(3)->create();
    }
}
