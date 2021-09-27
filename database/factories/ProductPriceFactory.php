<?php

namespace Database\Factories;

use App\Models\ProductPrice;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductPriceFactory extends Factory
{

    protected $model = ProductPrice::class;

    public function definition()
    {

        $min = 1.20;
        $max = 256.75;
        $price = mt_rand($min, $max) / 10;

        return [
            'product_id' => $this->faker->numberBetween(1,10),
            'price' => $price,
            'start_date' => $this->faker->dateTimeInInterval('-3 years', '+5 days'),
            'end_date' => $this->faker->dateTimeInInterval('-2 years', '+2 months')
        ];
    }
}
