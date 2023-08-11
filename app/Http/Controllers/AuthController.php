<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
        if($request->has('redirect')) {
            session()->put('redirect', $request->get('redirect'));
        }
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|exists:users',
                'password' => 'required',
            ]);

            $attempt = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            if($attempt) {
                if(session()->has('redirect')) {
                    return redirect()->to(session()->get('redirect'));
                }
                return redirect()->route('index');
            }else {
                return redirect()->back()->withErrors("E-posta veya şifre hatalı.")->withInput($request->all());
            }
        }

        return view('login');
    }

    public function register(Request $request) {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed',
            ]);

            $user = User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => $request->get('password'),
            ]);

            Auth::login($user);
            return redirect()->route('index');
        }

        return view('register');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('index');
    }
}
