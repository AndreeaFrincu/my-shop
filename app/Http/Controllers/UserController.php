<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{

    use AuthenticatesUsers;

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

    public function register(Request $request)
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

        User::create([
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email']
        ]);

        return response()->json(['msg' => 'Registered Successfully']);
    }

    public function login(Request $request) {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            return response()->json(Auth::user(), 200);
        }

        throw ValidationException::withMessages([
            'username' => ['The username is incorrect.'],
            'password' => ['The password is incorrect.'],
        ]);
    }

    public function delete()
    {

    }
}
