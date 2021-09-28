<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductController extends Controller
{

    use AuthenticatesUsers;

    public function getOne(Request $request)
    {
        return QueryBuilder::for(Product::class)
            ->where('id', $request->id)
            ->firstOrFail();
    }

    public function getAll(Request $request)
    {
        return QueryBuilder::for(Product::class)
            ->allowedFilters([
                AllowedFilter::exact('genre_id'),
                AllowedFilter::scope('search'),
                AllowedFilter::scope('current_price'),
            ])
            ->allowedSorts('title', 'currentPrice.price', 'products.id')
            ->get();
    }

    public function getTable(Request $request)
    {
        $page = $request->page ?? 1;
        $limit = $request->limit ?? 5;
        return QueryBuilder::for(Product::class)
            ->allowedFilters([
                AllowedFilter::scope('current_price'),
            ])
            ->paginate($limit, '*', 'page', $page);
    }

    public function update()
    {

    }

    public function create(Request $request)
    {
        return $request->perPage;
    }

    public function delete(Request $request)
    {
        Product::where('id', $request->id)->firstOrFail()->delete();
        return response()->json(null);
    }

}
