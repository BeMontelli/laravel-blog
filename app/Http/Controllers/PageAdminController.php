<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
//        $posts = Post::all();
        $posts = Post::latest()->take(6)->get();

        return view('myposts', [
            'title' => 'My posts',
            'content' => '<h1>My posts</h1><p>Lorem Ipsum ...</p>',
            'posts' => $posts,
        ]);
    }
}