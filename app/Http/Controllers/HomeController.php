<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Event;
use App\Models\News;
use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $sliderNews = News::with('category')->orderByDesc('created_at')->take(7)->get();
        $featuredNews = News::with('category')->where('created_at', '>=', now()->subDays(3))->take(5)->get();
        $recentNews = News::with(['category', 'writer', 'comments'])->orderByDesc('created_at')->take(10)->get();
        return view('index', compact('sliderNews', 'featuredNews', 'recentNews'));
    }

    public function contact(Request $request) {
        if($request->isMethod('post')) {
            $request->validate([
                'fullname' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'message' => 'required|min:20'
            ]);

            Contact::create([
                'fullname' => $request->get('fullname'),
                'email' => $request->get('email'),
                'subject' => $request->get('subject'),
                'message' => $request->get('message'),
            ]);

            return redirect()->back()->with('success', 'Bize ulaştığınız için teşekkürler!');
        }

        return view('contact');
    }

    public function category(Request $request, $id = null) {
        $category = Category::where('id', $id)->first();
        if($category == null) abort(404);
        $categoryNews = News::with(['category', 'writer', 'comments'])->where('category_id', $category->id)->orderByDesc('created_at')->paginate(6);
        return view('category', compact('category', 'categoryNews'));
    }

    public function single(Request $request, $id = null) {
        $news = News::with(['category', 'writer'])->where('id', $id)->first();
        if($news == null) abort(404);
        $news->setRelation('comments', $news->comments()->paginate(3));
        $news->increment('views');
        return view('single', compact('news'));
    }

    public function singleAddComment(Request $request, $id = null) {
        $request->validate([
            'comment' => 'required',
        ]);

        $news = News::where('id', $id)->first();
        if($news == null) abort(404);
        
        Comment::create([
            'comment' => $request->get('comment'),
            'user_id' => auth()->user()->id,
            'news_id' => $id
        ]);
        
        return redirect()->back()->with('scrollElement', 'comments');
    }

    public function events(Request $request) {
        $events = Event::where('event_date', '>', now())->orderBy('event_date')->paginate(6);
        return view('events', compact('events'));
    }

    public function event(Request $request, $id = null) {
        $event = Event::where('id', $id)->first();
        if($event == null) abort(404);
        return view('event', compact('event'));
    }

    public function newsletterSubscription(Request $request) {
        $request->validate([
            'email' => 'required|email|unique:newsletter_subscriptions',
        ]);

        NewsletterSubscription::create([
            'email' => $request->get('email'),
        ]);
        return redirect()->back()->with('message', 'Haber bültenine abone oldunuz!');
    }
}
