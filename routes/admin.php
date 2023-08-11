<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group. Make something great!
|
*/

Route::controller(AdminController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('news', 'news')->name('news');
    Route::any('news/add', 'add_news')->name('news.add');
    Route::get('comments', 'comments')->name('comments');
    Route::get('events', 'events')->name('events');
    Route::any('events/add', 'add_events')->name('events.add');
    Route::get('contacts', 'contacts')->name('contacts');
    // admin role
    Route::middleware('role:admin')->group(function() {
        Route::get('users', 'users')->name('users');
        Route::any('users/add', 'add_users')->name('users.add');
    });
});