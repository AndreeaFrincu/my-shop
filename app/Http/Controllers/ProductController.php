<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductController extends Controller
{

    use AuthenticatesUsers;

    public function getOne(Request $request)
    {
        return Product::where('id', $request->id)->firstOrFail();
    }

    public function getAll(Request $request)
    {
        return QueryBuilder::for(Product::class)
//            ->withCount('productPrices')
//            ->having('product_prices_count', '>', 0)
//            ->whereHas('productPrices', function ($query) {
//                return $query
//                    ->where(function ($query) {
//                        $query->where('start_date', '<', Carbon::today()->format('Y-m-d'))
//                            ->where('end_date', '>', Carbon::today()->format('Y-m-d'));
//                    })
//                    ->orWhere(function ($query) {
//                        $query->whereNull('start_date')
//                            ->where('end_date', '>', Carbon::today()->format('Y-m-d'));
//                    })
//                    ->orWhere(function ($query) {
//                        $query->where('start_date', '<', Carbon::today()->format('Y-m-d'))
//                            ->whereNull('end_date');
//
//                    })
//                    ->orWhere(function ($query) {
//                        $query->whereNull('start_date')
//                            ->whereNull('end_date');
//                    });
//
//            })

            ->allowedFilters([
                AllowedFilter::exact('genre_id'),
                AllowedFilter::scope('search'),
                AllowedFilter::scope('has_price'),
            ])
            ->allowedSorts('title', 'currentPrice.price', 'products.id')
            ->get();
    }

    public function getTable(Request $request)
    {
        $limit = $request->limit ?? 5;
        return QueryBuilder::for(Product::class)
            ->rightJoin('product_prices', 'products.id',
                '=', 'product_prices.product_id')
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
        Product::where('id', $request->id)->firstOrFail()->delete();
        return response()->json(null);
    }

}
