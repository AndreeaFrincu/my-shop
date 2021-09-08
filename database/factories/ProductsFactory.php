<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    protected $model = Products::class;

    public function definition()
    {
        $genre_id = rand(1, 10);
        $author_id = rand(1, 3);

        return [
            'genre_id' => $genre_id,
            'author_id' => $author_id,
            'title' => $this->faker->unique()->firstName(),
            'cartPosition' => 0
        ];
    }
}
