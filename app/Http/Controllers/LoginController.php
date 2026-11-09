<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login_banco(Request $request)
    {
        return view('login');
    }
}
