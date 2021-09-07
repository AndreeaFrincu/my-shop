<?php

namespace Database\Factories;

use App\Models\ProductPrices;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductPricesFactory extends Factory
{

    protected $model = ProductPrices::class;

    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween(1, 6),
            'price_id' => $this->faker->numberBetween(1, 6),
            'start_date' => $this->faker->dateTimeThisYear(),
            'end_date' => $this->faker->dateTimeThisMonth()
        ];
    }
}
