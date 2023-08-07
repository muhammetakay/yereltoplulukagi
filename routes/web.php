<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::controller(HomeController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('contact', 'contact')->name('contact');
    Route::get('category/{slug?}', 'category')->name('category');
    Route::get('single/{slug?}', 'single')->name('single');
});

Route::controller(AuthController::class)->group(function() {
    Route::get('login', 'login')->name('login');
});