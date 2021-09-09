<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function getOne()
    {

    }

    public function getAll()
    {
        return Price::with('productPrices')->get();
    }

    public function update()
    {

    }

    public function create()
    {

    }

    public function delete(Request $request)
    {
        return Price::where('id', $request->id)->delete();
        return Price::where('id', $request->id)->firstOrFail()->delete();
    }
}
