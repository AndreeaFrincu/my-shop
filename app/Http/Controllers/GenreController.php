<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{

    public function getOne(Request $request)
    {
        return Genre::with('products')->findOrFail($request->id);

    }

    public function getAll()
    {
        return Genre::all();
    }

    public function update()
    {

    }

    public function create()
    {

    }

    public function delete(Request $request)
    {
        return Genre::where('id', $request->id)->firstOrFail()->delete();
    }

}
