<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function getOne(Request $request)
    {
        return Author::with('products')->findOrFail($request->id);

    }

    public function getAll()
    {
        return Author::with('products')->get();
    }

    public function update()
    {

    }

    public function create()
    {

    }

    public function delete(Request $request)
    {
        return Author::where('id',$request->id)->firstOrFail()->delete();
    }
}
