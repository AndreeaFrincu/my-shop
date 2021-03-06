<?php

namespace Database\Factories;

use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderProductFactory extends Factory
{

    protected $model = OrderProduct::class;

    public function definition()
    {
        $product_price_id = rand(1, 6);
        $order_id = rand(1, 6);

        return [
            'product_price_id' => $product_price_id,
            'order_id' => $order_id,
            'quantity' => $this->faker->numberBetween(1, 20),
            'buy_date' => $this->faker->dateTimeThisMonth()
        ];
    }
}
