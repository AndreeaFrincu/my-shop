<?php

namespace App\Http\Controllers;

use App\Models\ProductPrice;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class ProductPriceController extends Controller
{
    public function getOne()
    {

    }

    public function getAll()
    {
        return QueryBuilder::for(ProductPrice::class)
            ->with('product', 'price')
            ->allowedSorts('price_id')
            ->get();
    }

    public function update()
    {

    }

    public function create()
    {

    }

    public function delete()
    {

    }
}
