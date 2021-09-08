<?php

namespace Database\Factories;

use App\Models\ProductPrices;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductPricesFactory extends Factory
{

    protected $model = ProductPrices::class;

    public function definition()
    {
        $product_id = rand(1, 6);
        $price_id = rand(1, 6);

        return [
            'product_id' => $product_id,
            'price_id' => $price_id,
            'start_date' => $this->faker->dateTimeThisYear(),
            'end_date' => $this->faker->dateTimeThisMonth()
        ];
    }
}
