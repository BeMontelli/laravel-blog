<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all()->sortByDesc("id");

        return view('admin.categories', [
            'title' => 'All categories',
            'content' => '<h1>All categories</h1><p>Lorem Ipsum ...</p>',
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('admin.categoriescreate', [
            'title' => "Create Category"
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'imageinput' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $folders = 'images/'.date("Y/m/d");
        $extension = $request->imageinput->extension();
        $imageName = time().'-'.Str::slug(basename($request->imageinput->getClientOriginalName(), ".".$extension), '-').'.'.$extension;
        $request->imageinput->move(public_path($folders), $imageName);
        $request->request->add(['image' => $folders.'/'.$imageName]);

        Category::create($request->all());

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categoriesedit', [
            "title" => "Edit Post",
            "category" => $category
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'imageinput' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $category = Category::find($id);

        $folders = 'images/'.date("Y/m/d");
        $extension = $request->imageinput->extension();
        $imageName = time().'-'.Str::slug(basename($request->imageinput->getClientOriginalName(), ".".$extension), '-').'.'.$extension;
        $request->imageinput->move(public_path($folders), $imageName);
        $request->request->add(['image' => $folders.'/'.$imageName]);

        $category->update($request->all());

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('admin.categorieshow', compact('category'));
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully');
    }
}
