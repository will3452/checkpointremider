<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view("register");
    }

    public function postRegister()
    {
        $data = request()->validate([
            'mobile_number'=>'required|unique:users,mobile_number',
            'email'=>'required|unique:users,email',
            'password'=>'required',
            'name'=>'required',
            'picture'=>'required'
        ]);

        $data['picture'] = $data['picture']->store('public');

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return 'registered successfully please go back to the app and login!';
    }
}
