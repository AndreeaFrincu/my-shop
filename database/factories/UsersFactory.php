<?php

namespace Database\Factories;

use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsersFactory extends Factory
{

    protected $model = Users::class;

    public function definition()
    {
        return [
            'username' => $this->faker->unique()->userName(),
            'password' => $this->faker->unique()->password(12, 22),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->email()
        ];
    }
}
