<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $genre_id = rand(1, 10);
        $author_id = rand(1, 3);

        return [
            'genre_id' => $genre_id,
            'author_id' => $author_id,
            'title' => $this->faker->unique()->firstName()
        ];
    }
}
