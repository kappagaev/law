<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function create(Request $request)
    {
        return view('user/login')->with('title', 'Логін');
    }

    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('/')->with(Auth::user()->name . ', вітаємо!');
        }
        return redirect()->back()->with('message', 'Пароль або пошта неправильні');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
