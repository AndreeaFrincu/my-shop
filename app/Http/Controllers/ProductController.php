<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
            ->join('product_prices', 'products.id',
                '=', 'product_prices.product_id')
            ->allowedFilters([
                AllowedFilter::exact('genre_id'),
                AllowedFilter::scope('search'),
                AllowedFilter::trashed()
            ])
            ->allowedSorts('title', 'price')
            ->get();
    }

    public function getTable(Request $request)
    {
        $limit = $request->limit ?? 5;
        return QueryBuilder::for(Product::class)
            ->paginate($limit);
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
        Product::where('id',$request->id)->firstOrFail()->delete();
        return response()->json(null);
    }

}
