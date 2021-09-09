<?php

namespace Database\Factories;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

class GenreFactory extends Factory
{

    protected $model = Genre::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'Historical Fiction', 'Comedy', 'Mystery', 'Supernatural', 'Fantasy',
                'Science Fiction', 'Adventure', 'Dystopian', 'History', 'Thriller'])
        ];
    }
}
