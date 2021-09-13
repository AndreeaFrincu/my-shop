<?php

namespace App\Http\Controllers;

use App\Models\Product;
use http\QueryString;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductController extends Controller
{
    public function getOne(Request $request)
    {
        return Product::where('id', $request->id)->firstOrFail();
    }

    public function getAll(Request $request)
    {
        return QueryBuilder::for(Product::class)
            ->allowedFilters([
                AllowedFilter::exact('genre_id'),
                AllowedFilter::scope('search')
            ])
            ->allowedSorts('title')
            ->get();
    }

    public function getTable(Request $request)
    {
        $perPage = response()->has('limit');

        return QueryBuilder::for(Product::class)
            ->paginate($perPage);
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
