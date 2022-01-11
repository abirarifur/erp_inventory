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
    public function logout(Request $request)
    {
        auth()->guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['success' => 'Logout Successfully'], 200);
    }
}
