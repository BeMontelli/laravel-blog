<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{

    public function create()
    {
        $categories = Category::all();
        return view('admin.postcreate', [
            'title' => "All Posts",
            'categories' => $categories
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'content' => 'required',
            'imageinput' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $folders = 'images/'.date("Y/m/d");
        $extension = $request->imageinput->extension();
        $imageName = time().'-'.Str::slug(basename($request->imageinput->getClientOriginalName(), ".".$extension), '-').'.'.$extension;
        $request->imageinput->move(public_path($folders), $imageName);
        $request->request->add(['image' => $folders.'/'.$imageName]);

        $request->request->add(['user_id' => Auth::id()]);

        $post = Post::create($request->all());

        $post->categories()->attach($request->categories);
        // or
        /*$post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->content = $request->content;
        $post->user_id = Auth::id();
        $post->save();*/

        return redirect()->route('admin.myposts')
            ->with('success', 'Post created successfully.');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.postshow', compact('post'));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::find($id);
        $idCategories = array_column($post->categories->all(), 'id');
        return view('admin.postedit', [
            "title" => "Edit Post",
            "post" => $post,
            'categories' => $categories,
            'idCategories' => $idCategories,
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'content' => 'required',
            'imageinput' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $post = Post::find($id);

        $folders = 'images/'.date("Y/m/d");
        $extension = $request->imageinput->extension();
        $imageName = time().'-'.Str::slug(basename($request->imageinput->getClientOriginalName(), ".".$extension), '-').'.'.$extension;
        $request->imageinput->move(public_path($folders), $imageName);
        $request->request->add(['image' => $folders.'/'.$imageName]);

        $post->update($request->all());

        $post->categories()->sync($request->categories);

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
