<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function getOne()
    {

    }

    public function getAll()
    {
        return QueryBuilder::for(User::class)
            ->get();
    }

    public function update()
    {

    }

    public function create(Request $request)
    {
        $validated = $this->validate($request, [
            'username' => 'bail|required|min:6|max:20|unique:users,username',
            'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/',
            'first_name' => 'required|min:3|max:35',
            'last_name' => 'required|min:3|max:35',
            'email' => 'required|email|unique:users,email',
        ],
        [
            'username.unique' => 'Username is already taken',
            'email.unique' => 'Email is already taken',
        ]
        );

        $user = User::create([
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email']
        ]);

        return $user;

//        $token = $request->$user->createToken('auth_token')
//            ->plainTextToken;
//
//        return response()->json([
//            'access_token' => $token,
//            'token_type' => 'Bearer'
//        ]);
    }

    public function login(Request $request) {
        $rules = array(
            'username' => 'required',
            'password' => 'required'
        );


    }

    public function delete()
    {

    }
}
