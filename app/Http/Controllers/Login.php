<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Login extends Controller
{
    public function login()
    {

        return view('front.login.login');
    }

    public function register()
    {
        return view('front.login.register');
    }

    public function forgotPassword()
    {
        return view('front.login.forgot_password');
    }
}
