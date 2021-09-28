<?php

namespace App\Http\Controllers;

use App\Models\CartProduct;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CartProductsController extends Controller
{
    public function getAll() {
        return QueryBuilder::for(CartProduct::class)
            ->allowedFilters([
                AllowedFilter::exact('cart_id'),
            ])
            ->get();
    }

    public function getOne(Request $request) {
        return QueryBuilder::for(CartProduct::class)
            ->where('id', $request->id)
            ->get();
    }
}
