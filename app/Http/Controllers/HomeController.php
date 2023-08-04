<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('index');
    }

    public function contact() {
        return view('contact');
    }

    public function category(Request $request, $slug = null) {
        return view('category');
    }

    public function single(Request $request, $slug = null) {
        return view('single');
    }

}
