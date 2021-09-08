<?php

namespace Database\Factories;

use App\Models\Genres;
use Illuminate\Database\Eloquent\Factories\Factory;

class GenresFactory extends Factory
{

    protected $model = Genres::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'Historical Fiction', 'Comedy', 'Mystery', 'Supernatural', 'Fantasy',
                'Science Fiction', 'Adventure', 'Dystopian', 'History', 'Thriller'])
        ];
    }
}
