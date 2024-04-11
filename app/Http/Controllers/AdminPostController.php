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
        return redirect()->route('admin.myposts')
            ->with('success', 'Post created successfully.');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('postshow', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('postedit', [
            "title" => "Edit Post",
            "post" => $post
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'content' => 'required',
        ]);
        $post = Post::find($id);
        $post->update($request->all());
        return redirect()->route('admin.myposts')
            ->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('admin.myposts')
            ->with('success', 'Post deleted successfully');
    }

}
