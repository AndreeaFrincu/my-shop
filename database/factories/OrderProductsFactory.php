<?php

namespace Database\Factories;

use App\Models\OrderProducts;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderProductsFactory extends Factory
{

    protected $model = OrderProducts::class;

    public function definition()
    {
        return [
            'product_price_id' => $this->faker->numberBetween(1, 6),
            'order_id' => $this->faker->numberBetween(1, 6),
            'quantity' => $this->faker->numberBetween(1, 20),
            'buy_date' => $this->faker->dateTimeThisMonth()
        ];
    }
}
