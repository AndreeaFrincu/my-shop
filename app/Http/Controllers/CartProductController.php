<?php

namespace App\Http\Controllers;

use App\Models\CartProduct;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CartProductController extends Controller
{
    public function getAll()
    {
        return QueryBuilder::for(CartProduct::class)
            ->allowedFilters([
                AllowedFilter::exact('cart.user_id'),
            ])
            ->get();
    }

    public function getOne(Request $request)
    {
        return QueryBuilder::for(CartProduct::class)
            ->where('id', $request->id)
            ->get();
    }

    public function getTable(Request $request)
    {
        $page = $request->page ?? 1;
        $limit = $request->limit ?? 5;

        return QueryBuilder::for(CartProduct::class)
            ->allowedFilters([
                AllowedFilter::exact('cart.user_id'),
            ])
            ->paginate($limit, '*', 'page', $page);
    }
}
