<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{

    public function legals(): View
    {
        $items = array(
            "test",
            "test 2",
        );

        return view('legals', [
            'title' => 'Legals',
            'content' => '<h1>Legals</h1><p>Lorem Ipsum 2 ...</p>',
            'items' => $items,
        ]);
    }

    public function aboutus(): View
    {
        return view('aboutus', [
            'title' => 'About Us',
            'content' => '<h1>About Us</h1><p>Lorem Ipsum 2 ...</p>',
        ]);
    }

    public function welcome(): View
    {
//        $posts = Post::all();
        $posts = Post::latest()->take(6)->get();

        return view('welcome', [
            'title' => 'Welcome',
            'content' => '<h1>Welcome</h1><p>Lorem Ipsum 2 ...</p>',
            'posts' => $posts,
        ]);
    }
}
