<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class ProductController extends Controller
{
    public function getOne(Request $request)
    {
        return Product::with(['author', 'genre'])->where('id', $request->id)->firstOrFail();
    }

    public function getAll(Request $request)
    {
        return QueryBuilder::for(Product::class)
            ->allowedFilters('genre.name')
            ->allowedSorts('title')
            ->get();
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
        Product::where('id',$request->id)->firstOrFail()->delete();
        return response()->json(null);
    }

}
