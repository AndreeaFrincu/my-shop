<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use Illuminate\Http\Request;

class GenresController extends Controller
{

    public function getOne()
    {

    }

    public function getAll(): array
    {
        return [
            [
                "id"=> 1,
                "genre"=> "Historical Fiction"
            ],
            [
                "id"=> 2,
                "genre"=> "Comedy"
            ],
            [
                "id"=> 3,
                "genre"=> "Mystery"
            ],
            [
                "id"=> 4,
                "genre"=> "Supernatural"
            ],
            [
                "id"=> 5,
                "genre"=> "Fantasy"
            ],
            [
                "id"=> 6,
                "genre"=> "Science Fiction"
            ],
            [
                "id"=> 7,
                "genre"=> "Adventure"
            ],
            [
                "id"=> 8,
                "genre"=> "Dystopian"
            ],
            [
                "id"=> 9,
                "genre"=> "History"
            ],
            [
                "id"=> 10,
                "genre"=> "Thriller"
            ]
        ];
    }

    public function update()
    {

    }

    public function create()
    {

    }

    public function delete()
    {

    }

}
