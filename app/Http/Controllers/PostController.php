<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::all();
        $categories = Category::all();

        return view('blog', [
            'title' => 'My posts',
            'content' => '<h1>My posts</h1><p>Lorem Ipsum ...</p>',
            'categories' => $categories,
            'posts' => $posts,
        ]);
    }

    public function category($id) : View
    {
        $category = Category::find($id);
        $categories = Category::all();
        $posts = $category->posts;
        return view('blogcategory', [
            'title' => $category->title,
            'content' => $category->description,
            'categories' => $categories,
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
