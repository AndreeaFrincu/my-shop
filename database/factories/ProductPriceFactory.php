<?php

namespace Database\Factories;

use App\Models\ProductPrice;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductPriceFactory extends Factory
{

    protected $model = ProductPrice::class;

    public function definition()
    {
        $product_id = rand(1, 6);

        return [
            'product_id' => $product_id,
            'price_id' => $this->faker->unique()->randomElement([
                '1', '2', '3', '4', '5', '6'
            ]),
            'start_date' => $this->faker->dateTimeThisYear(),
            'end_date' => $this->faker->dateTimeThisMonth()
        ];
    }
}
