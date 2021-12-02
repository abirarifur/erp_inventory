<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\AuthenticationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if(!auth()->attempt($request->only('email', 'password')))
        {
            throw new AuthenticationException();
        }
    }
    public function logout()
    {
        if(auth()->check())
        {
            auth()->logout();
        }
    }
}
