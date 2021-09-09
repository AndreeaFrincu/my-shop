<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{

    protected $model = Order::class;

    public function definition()
    {
        $user_id = rand(1, 3);

        return [
            'user_id' => $user_id,
            'total_cost' => $this->faker->randomFloat()
        ];
    }
}
