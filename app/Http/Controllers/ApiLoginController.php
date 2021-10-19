<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiLoginController extends Controller
{
    public function userExists($mobile)
    {
        $user = User::where('mobile_number', $mobile)->first();

        if (is_null($user)) {
            return false;
        }

        return $user;
    }
    public function login()
    {
        if (is_null(request()->password) || is_null(request()->mobile_number)) {
            return response([
                'error'=>true,
                'message'=>'fields are required!'
            ], 400);
        }


        //check if the mobile is existing
        $user = $this->userExists(request()->mobile_number);

        if (!$user) {
            return response([
                'error'=>true,
                'message'=>'account not found!'
            ], 400);
        }

        //check if password is correct
        if (!Hash::check(request()->password, $user->password)) {
            return response([
                'error'=>true,
                'message'=>'credentials not valid!'
            ], 400);
        }

        $token = $user->createToken('my-app')->plainTextToken;

        return response([
            'token'=>$token,
            'user'=>$user,
        ], 200);
    }
}
