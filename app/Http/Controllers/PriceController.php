<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class PriceController extends Controller
{
    public function getOne()
    {

    }

    public function getAll()
    {
        return QueryBuilder::for(Price::class)
            ->with('product_prices')
            ->allowedSorts('price')
            ->get();
    }

    public function update()
    {

    }

    public function create()
    {

    }

    public function delete(Request $request)
    {
        return Price::where('id', $request->id)->firstOrFail()->delete();
    }
}
