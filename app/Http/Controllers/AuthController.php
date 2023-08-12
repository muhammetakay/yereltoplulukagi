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

            $attempt = Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'));
            if($attempt) {
                $user = Auth::user();
                if($user->hasRole('banned')) {
                    Auth::logout();
                    return redirect()->back()->withErrors("Hesabınız banlanmıştır.")->withInput($request->all());
                }
                if(session()->has('redirect')) {
                    $redirect = session()->get('redirect');
                    session()->forget('redirect');
                    return redirect()->to($redirect);
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

            User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => $request->get('password'),
            ]);

            return redirect()->route('login')->with('message', 'Başarıyla kayıt oldunuz. Hesabınıza giriş yapın.');
        }

        return view('register');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('index');
    }
}
