<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::paginate(12);

        return view('admin.users', [
            'title' => 'All users',
            'content' => '<h1>All users</h1><p>Lorem Ipsum ...</p>',
            'users' => $users,
        ]);
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('usershow', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.usersedit', [
            "title" => "Edit User",
            "user" => $user
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'role' => 'nullable|in:admin',
        ]);
        $user = User::find($id);
        $user->update($request->all());
        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully');
    }

}
