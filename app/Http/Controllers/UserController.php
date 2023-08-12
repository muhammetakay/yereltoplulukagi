<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index() {
        $user = auth()->user();
        return view('user.index', compact('user'));
    }

    public function change_password(Request $request) {
        $user = auth()->user();
        if($request->isMethod('post')) {
            $request->validate([
                'old_password' => 'required|current_password',
                'new_password' => 'required|confirmed|different:old_password',
            ]);

            $user->update([
                'password' => $request->new_password
            ]);

            return redirect()->back()->with('success', 'Şifre başarıyla değiştirildi.');
        }

        return view('user.change-password', compact('user'));
    }

    public function store(Request $request) {
        $user = auth()->user();
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->back()->with('success', 'Kullanıcı ayarları başarıyla güncellendi.');
    }
}
