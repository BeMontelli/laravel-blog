<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::all();

        return view('blog', [
            'title' => 'My posts',
            'content' => '<h1>My posts</h1><p>Lorem Ipsum ...</p>',
            'posts' => $posts,
        ]);
    }

    public function show($id) : View
    {
        $post = Post::find($id);
        return view('postsingle', [
            'title' => $post->title,
            'post' => $post,
        ]);
    }

}
