<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
        if($request->isMethod('post')) {
            $request->validate([
                'title' => 'required',
                'content' => 'required',
                'category' => 'required|exists:categories,id',
                'image' => 'required|image'
            ]);

            $fileName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/uploads', $fileName);

            News::create([
                'title' => $request->title,
                'content' => $request->content,
                'category_id' => $request->category,
                'user_id' => $user->id,
                'image_path' => 'storage/uploads/' . $fileName,
            ]);

            return redirect()->back()->with('message', 'Haber başarıyla eklendi.');
        }
        return view('admin.news-add', compact('user'));
    }
    
    public function comments() {
        $user = auth()->user();
        $comments = Comment::with(['news', 'user'])->get();
        return view('admin.comments', compact('user', 'comments'));
    }

    public function events() {
        $user = auth()->user();
        $events = Event::all();
        return view('admin.events', compact('user', 'events'));
    }

    public function add_events(Request $request) {
        $user = auth()->user();
        if($request->isMethod('post')) {
            $request->validate([
                'event_name' => 'required',
                'event_date' => 'required|date|after:now',
                'location' => 'required',
                'organizer' => 'required',
                'description' => 'required',
                'event_image' => 'required|image'
            ]);

            $fileName = time() . '.' . $request->event_image->extension();
            $request->event_image->storeAs('public/uploads', $fileName);

            Event::create([
                'name' => $request->event_name,
                'event_date' => $request->event_date,
                'location' => $request->location,
                'organizer' => $request->organizer,
                'description' => $request->description,
                'image_path' => 'storage/uploads/' . $fileName,
            ]);

            return redirect()->back()->with('message', 'Etkinlik başarıyla eklendi.');
        }
        return view('admin.events-add', compact('user'));
    }

    public function contacts() {
        $user = auth()->user();
        $contacts = Contact::all();
        return view('admin.contacts', compact('user', 'contacts'));
    }
}
