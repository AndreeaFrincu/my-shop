<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class CartController extends Controller
{
    public function getAll() {
        return QueryBuilder::for(Cart::class)
            ->get();
    }

    public function getOne(Request $request) {
        return QueryBuilder::for(Cart::class)
            ->where('id', $request->id)
            ->firstOrFail();
    }
}
