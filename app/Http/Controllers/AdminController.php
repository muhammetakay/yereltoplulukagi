<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Event;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

    public function index() {
        $user = auth()->user();
        return view('admin.dashboard', compact('user'));
    }

    public function users() {
        $user = auth()->user();
        $users = User::all();
        $roles = Role::all();
        return view('admin.users', compact('user', 'users', 'roles'));
    }

    public function add_users(Request $request) {
        $user = auth()->user();
        return view('admin.users-add', compact('user'));
    }

    public function news() {
        $user = auth()->user();
        $news_list = News::with(['category', 'writer'])->get();
        return view('admin.news', compact('user', 'news_list'));
    }

    public function add_news(Request $request) {
        $user = auth()->user();
        return view('admin.news-add', compact('user'));
    }

    public function events() {
        $user = auth()->user();
        $events = Event::all();
        return view('admin.events', compact('user', 'events'));
    }

    public function add_events(Request $request) {
        $user = auth()->user();
        return view('admin.events-add', compact('user'));
    }

    public function contacts() {
        $user = auth()->user();
        $contacts = Contact::all();
        return view('admin.contacts', compact('user', 'contacts'));
    }
}
