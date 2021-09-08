<?php

namespace Database\Factories;

use App\Models\Orders;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrdersFactory extends Factory
{

    protected $model = Orders::class;

    public function definition()
    {
        $user_id = rand(1, 3);

        return [
            'user_id' => $user_id,
            'total_cost' => $this->faker->randomFloat()
        ];
    }
}
