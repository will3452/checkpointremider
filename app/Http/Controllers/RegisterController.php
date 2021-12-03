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

    public function showAdminRegister()
    {
        return view("admin-register");
    }

    public function postRegister()
    {
        $data = request()->validate([
            'mobile_number'=>'required|unique:users,mobile_number',
            'email'=>'required|unique:users,email',
            'password'=>'required|confirmed',
            'name'=>'required',
            'picture'=>'required'
        ]);

        $data['picture'] = $data['picture']->store('public');

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return 'registered successfully please go back to the app and login!';
    }

    public function postAdminRegister()
    {
        $data = request()->validate([
            'email'=>'required|unique:users,email',
            'password'=>'required|confirmed',
            'name'=>'required',
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return 'registered successfully <a href="/">Login now</a>';
    }
}
