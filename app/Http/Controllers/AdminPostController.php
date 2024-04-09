<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AdminPostController extends Controller
{

    public function create()
    {
        return view('postcreate', [
            'title' => "All Posts"
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'content' => 'required',
        ]);
        Post::create($request->all());
        return redirect()->route('admin.posts.index')
            ->with('success', 'Post created successfully.');
    }

}
