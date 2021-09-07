<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Products::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'genre_id' => $this->faker->numberBetween(1, 10),
            'author_id' => $this->faker->numberBetween(1, 3),
            'title' => $this->faker->unique()->firstName(),
            'cartPosition' => 0
        ];
    }
}
