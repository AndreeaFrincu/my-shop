<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getOne()
    {
        return Product::with(['author','genre'])->firstOrFail();
        return [
            [
                "id"=>1,
                "title"=>"a",
                "author"=>"auth1",
                "price"=>27,
                "quantity"=>1,
                "cartPosition"=>0,
                "genres"=>[
                    [
                        "id"=>1,
                        "genre"=>"Historical Fiction"
                    ],
                    [
                        "id"=>2,
                        "genre"=>"Comedy"
                    ],
                    [
                        "id"=>3,
                        "genre"=>"Mystery"
                    ],
                ]
            ]
        ];
    }

    public function getAll(): array
    {
        return [
            [
                "id"=>1,
                "title"=>"a",
                "author"=>"auth1",
                "price"=>27,
                "quantity"=>1,
                "cartPosition"=>0,
                "genres"=>[
                    [
                        "id"=>1,
                        "genre"=>"Historical Fiction"
                    ],
                    [
                        "id"=>2,
                        "genre"=>"Comedy"
                    ],
                    [
                        "id"=>3,
                        "genre"=>"Mystery"
                    ],
                ]
            ],
            [
                "id"=> 2,
                "title"=> "b",
                "author"=> "auth2",
                "price"=> 15,
                "quantity"=> 1,
                "cartPosition"=>0,
                "genres"=> [
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
                    ]
                ]
            ],
            [
                "id"=> 3,
                "title"=> "c",
                "author"=> "auth3",
                "price"=> 10,
                "quantity"=> 1,
                "cartPosition"=>0,
                "genres"=> [
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
                    ]
                ]
            ],
            [
                "id"=> 4,
                "title"=> "d",
                "author"=> "auth4",
                "price"=> 50,
                "quantity"=> 1,
                "cartPosition"=>0,
                "genres"=> [
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
                    ]
                ]
            ],
            [
                "id"=> 5,
                "title"=> "e",
                "author"=> "auth5",
                "price"=> 35,
                "quantity"=> 1,
                "cartPosition"=>0,
                "genres"=> [
                    [
                        "id"=> 9,
                        "genre"=> "History"
                    ],
                    [
                        "id"=> 10,
                        "genre"=> "Thriller"
                    ],
                    [
                        "id"=> 1,
                        "genre"=> "Historical Fiction"
                    ]
                ]
            ],
            [
                "id"=> 6,
                "title"=> "f",
                "author"=> "auth6",
                "price"=> 21,
                "quantity"=> 1,
                "cartPosition"=>0,
                "genres"=> [
                    [
                        "id"=> 10,
                        "genre"=> "Thriller"
                    ],
                    [
                        "id"=> 1,
                        "genre"=> "Historical Fiction"
                    ],
                    [
                        "id"=> 2,
                        "genre"=> "Comedy"
                    ]
                ]
            ],
            [
                "id"=> 7,
                "title"=> "g",
                "author"=> "auth7",
                "price"=> 4,
                "quantity"=> 1,
                "cartPosition"=>0,
                "genres"=> [
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
                    ]
                ]
            ]
        ];
    }

    public function getTable()
    {

    }

    public function update()
    {

    }

    public function create()
    {

    }

    public function delete(Request $request)
    {
        Product::where('id',$request->id)->delete();
        return response()->json(null);
    }

}
