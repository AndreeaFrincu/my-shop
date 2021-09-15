<?php

namespace Database\Factories;

use App\Models\CartProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartProductFactory extends Factory
{
    protected $model = CartProduct::class;

    public function definition()
    {
        $cart_id = rand(1, 3);
        $product_id = rand(1, 10);

        return [
            'cart_id' => $cart_id,
            'product_id' => $product_id,
            'quantity' => $this->faker->numberBetween(1,20)
        ];
    }
}
