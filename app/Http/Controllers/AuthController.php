<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use App\User;

class AuthController extends Controller
{
    public function registerValidation(Request $request)
    {
        $request->validate([
            'firstname'=>'required|string',
            'lastname'=>'required|string',
            'email'=>'required|email',
            'password'=>'required|confirmed|min:6'
        ]);

        $user = User::firstOrCreate([
            'email'=>$request->email,
        ],
        [
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);
        return $user;
    }
}
