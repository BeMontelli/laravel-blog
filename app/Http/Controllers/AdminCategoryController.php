<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories', [
            'title' => 'All categories',
            'content' => '<h1>All categories</h1><p>Lorem Ipsum ...</p>',
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    public function edit(Category $category)
    {
        //
    }
    public function update(Request $request, Category $category)
    {
        //
    }

    public function show(Category $category)
    {
        //
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully');
    }
}
