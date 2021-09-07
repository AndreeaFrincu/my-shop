<?php

namespace Database\Factories;

use App\Models\Orders;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrdersFactory extends Factory
{

    protected $model = Orders::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 3),
            'total_cost' => $this->faker->randomFloat()
        ];
    }
}
