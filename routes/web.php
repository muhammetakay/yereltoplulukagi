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
    Route::any('contact', 'contact')->name('contact');
    Route::get('category/{id?}', 'category')->name('category');
    Route::get('single/{id?}', 'single')->name('single');
    Route::post('single/{id}/add-comment', 'singleAddComment')->name('single.add.comment');
    Route::get('events', 'events')->name('events');
    Route::get('event/{id?}', 'event')->name('event');
    Route::post('newsletter-subscription', 'newsletterSubscription')->name('newsletter-subscription');
});

Route::controller(AuthController::class)->middleware('guest')->group(function() {
    Route::any('login', 'login')->name('login');
    Route::any('register', 'register')->name('register');
    Route::any('logout', 'logout')->name('logout')->withoutMiddleware('guest');
});