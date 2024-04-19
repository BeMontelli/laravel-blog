<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class PageAdminController extends Controller
{

    public function dashboard(): View
    {
        return view('dashboard', [
            'title' => 'Dashboard',
            'content' => '<h1>Dashboard</h1><p>Lorem Ipsum 2 ...</p>',
        ]);
    }

    public function myposts(): View
    {
        // $posts = Post::all();
        // $posts = Post::latest()->take(6)->get();
        $posts = Post::where('user_id', Auth::user()->id)->paginate(12);
        abort_unless($posts->count() > 0 || $posts->currentPage() === 1, 404);

        return view('myposts', [
            'title' => 'My posts',
            'content' => '<h1>My posts</h1><p>Lorem Ipsum ...</p>',
            'posts' => $posts,
        ]);
    }
}
