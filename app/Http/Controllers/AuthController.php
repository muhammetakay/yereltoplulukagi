<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|exists:users',
                'password' => 'required',
            ]);

            $attempt = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            if($attempt) {
                return redirect()->route('index');
            }else {
                return redirect()->back()->withErrors("E-posta veya şifre hatalı.")->withInput($request->all());
            }
        }

        return view('login');
    }

    public function register(Request $request) {
        return view('register');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('index');
    }
}
