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
        $posts = Post::paginate(12);
        abort_unless($posts->count() > 0 || $posts->currentPage() === 1, 404);
        $categories = Category::all();

        return view('blog', [
            'title' => 'My posts',
            'content' => '<h1>My posts</h1><p>Lorem Ipsum ...</p>',
            'categories' => $categories,
            'posts' => $posts,
        ]);
    }

    public function category(Category $category) : View
    {
        $categories = Category::all();
        $posts = $category->posts()->paginate(12);
        abort_unless($posts->count() > 0 || $posts->currentPage() === 1, 404);

        return view('blogcategory', [
            'image' => $category->image,
            'title' => $category->title,
            'content' => $category->description,
            'categories' => $categories,
            'posts' => $posts,
        ]);
    }

    public function show(Post $post) : View
    {
        return view('postsingle', [
            'title' => $post->title,
            'post' => $post,
        ]);
    }

}
