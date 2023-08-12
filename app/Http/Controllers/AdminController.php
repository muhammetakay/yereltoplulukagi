<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Contact;
use App\Models\Event;
use App\Models\News;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $newComments = Comment::where('created_at', '>', now()->subDay())->count();
        $newNews = News::where('created_at', '>', now()->subDay())->count();
        $newEvents = Event::where('created_at', '>', now()->subDay())->count();
        $newContacts = Contact::where('created_at', '>', now()->subDay())->count();
        $newsChart = [];
        $year = intval(date("Y"));
        for ($i = $year - 1; $i <= $year; $i++) {
            for ($j = 1; $j <= 4; $j++) {
                $startMonth = (($j - 1) * 3) + 1;
                $endMonth = $j * 3;
                array_push($newsChart, [
                    "period" => "$i Q$j",
                    "count" => News::whereBetween('created_at', [now()->setDate($i, $startMonth, 1), now()->setDate($i, $endMonth, 1)->endOfMonth()])->count(),
                ]);
            }
        }
        $donutChart = [];
        $month = intval(date("m"));
        for ($i=2; $i >= 0; $i--) {
            $startDate = now()->subMonths($i);
            $endDate = now()->subMonths($i);
            array_push($donutChart, [
                "label" => $startDate->translatedFormat("F"),
                "value" => News::whereBetween('created_at', [$startDate->startOfMonth(), $endDate->endOfMonth()])->sum('views'),
            ]);
        }
        return view('admin.dashboard', compact('user', 'newComments', 'newNews', 'newEvents', 'newContacts', 'newsChart', 'donutChart'));
    }

    public function users()
    {
        $user = auth()->user();
        $users = User::all();
        $roles = Role::all();
        return view('admin.users', compact('user', 'users', 'roles'));
    }

    public function add_role_users(Request $request, $role, $id)
    {
        $user = User::where('id', $id)->first();
        if(!in_array($role, Role::all()->pluck('name')->toArray())) {
            return redirect()->back()->withErrors('Rol bulunamadı');
        }
        if($user->hasRole($role)) {
            $user->removeRole($role);
        }else {
            $user->assignRole($role);
        }
        return redirect()->back();
    }

    public function news()
    {
        $user = auth()->user();
        $news_list = News::with(['category', 'writer'])->get();
        return view('admin.news', compact('user', 'news_list'));
    }

    public function add_news(Request $request)
    {
        $user = auth()->user();
        if ($request->isMethod('post')) {
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

    public function edit_news(Request $request, $id)
    {
        $user = auth()->user();
        $news = News::where('id', $id)->first();
        if ($request->isMethod('post')) {
            $request->validate([
                'title' => 'required',
                'content' => 'required',
                'category' => 'required|exists:categories,id',
                'image' => 'image|nullable'
            ]);

            $changes = [
                'title' => $request->title,
                'content' => $request->content,
                'category_id' => $request->category,
            ];

            if($request->has('image')) {
                $fileName = time() . '.' . $request->image->extension();
                $request->image->storeAs('public/uploads', $fileName);
                $changes['image_path'] = 'storage/uploads/' . $fileName;
            }

            $news->update($changes);
            return redirect()->route('admin.news');
            // return redirect()->back()->with('message', 'Haber başarıyla düzenlendi.');
        }
        return view('admin.news-edit', compact('user', 'news'));
    }

    public function delete_news(Request $request, $id)
    {
        $news = News::where('id', $id)->first();
        $news->delete();

        return redirect()->back();
    }

    public function comments()
    {
        $user = auth()->user();
        $comments = Comment::with(['news', 'user'])->get();
        return view('admin.comments', compact('user', 'comments'));
    }

    public function delete_comments(Request $request, $id)
    {
        $comment = Comment::where('id', $id)->first();
        $comment->delete();

        return redirect()->back();
    }

    public function events()
    {
        $user = auth()->user();
        $events = Event::all();
        return view('admin.events', compact('user', 'events'));
    }

    public function add_events(Request $request)
    {
        $user = auth()->user();
        if ($request->isMethod('post')) {
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

    public function contacts()
    {
        $user = auth()->user();
        $contacts = Contact::all();
        return view('admin.contacts', compact('user', 'contacts'));
    }
}