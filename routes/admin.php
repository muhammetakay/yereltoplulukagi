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
    // news
    Route::get('news', 'news')->name('news');
    Route::any('news/add', 'add_news')->name('news.add');
    Route::any('news/edit/{id}', 'edit_news')->name('news.edit');
    Route::any('news/delete/{id}', 'delete_news')->name('news.delete');
    // comments
    Route::get('comments', 'comments')->name('comments');
    Route::any('comments/delete/{id}', 'delete_comments')->name('comments.delete');
    // categories
    Route::get('categories', 'categories')->name('categories');
    Route::any('categories/add', 'add_categories')->name('categories.add');
    Route::any('categories/edit/{id}', 'edit_categories')->name('categories.edit');
    Route::any('categories/delete/{id}', 'delete_categories')->name('categories.delete');
    // events
    Route::get('events', 'events')->name('events');
    Route::any('events/add', 'add_events')->name('events.add');
    Route::any('events/edit/{id}', 'edit_events')->name('events.edit');
    Route::any('events/delete/{id}', 'delete_events')->name('events.delete');
    // contacts
    Route::get('contacts', 'contacts')->name('contacts');
    // admin role only
    Route::middleware('role:admin')->group(function() {
        // users
        Route::get('users', 'users')->name('users');
        Route::get('users/add-role/{role}/{id}', 'add_role_users')->name('users.add-role');
    });
});