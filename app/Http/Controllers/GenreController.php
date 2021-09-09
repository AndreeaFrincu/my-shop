<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{

    public function getOne(Request $request)
    {
        return Genre::with('products')->findOrFail($request->id);

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

    public function delete(Request $request)
    {
        return Genre::where('id', $request->id)->firstOrFail()->delete();
    }

}
