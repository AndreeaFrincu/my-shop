<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getOne()
    {

    }

    public function getAll()
    {

    }

    public function update()
    {

    }

    public function create(Request $request)
    {
        return $this->validate($request, [
            'username' => 'bail|required|min:6|max:20|unique:users,username',
            'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/',
            'first_name' => 'required|min:3|max:35',
            'last_name' => 'required|min:3|max:35',
            'email' => 'required|email|unique:users,email',
        ], [
            'username.required' => 'Username is required',
            'username.min' => 'Username is too short',
            'username.max' => 'Username is too long',
            'username.unique' => 'Username is already taken',

            'password.required' => 'Password is required',
            'password.regex' => 'Password must contain: at least 12 characters,
                                uppercase and lowercase letters, numbers, and special
                                characters',

            'first_name.required' => 'First Name is required',
            'first_name.min' => 'First Name is too short',
            'first_name.max' => 'First Name is too long',

            'last_name.required' => 'Last Name is required',
            'last_name.min' => 'Last Name is too short',
            'last_name.max' => 'Last Name is too long',

            'email.required' => 'Email is required',
            'email.unique' => 'Email is already taken',
        ]);
    }

    public function delete()
    {

    }
}
