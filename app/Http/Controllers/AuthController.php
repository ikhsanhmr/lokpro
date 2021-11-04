<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        $data = [
            'title' => 'Login Page'
        ];

        return view("auth/login", $data);
    }

    public function register()
    {
        $data = [
            'title' => 'Register Page'
        ];

        return view("auth/register", $data);
    }

    public function logout()
    {
        return redirect('/login');
    }
}
