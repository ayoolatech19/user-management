<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
  public function index(Request $request)
  {
    $search = $request->input('search');
       $users = User::where('id', '!=', auth()->id())->when($search, function ($query, $search) {
       $query->where('name', 'like', "%{$search}%")
        ->orWhere('email', 'like', "%{$search}%");
    })->paginate(10);

    return view('admin.users', compact('users', 'search'));
  }

public function edit(User $user)
  {
    return view('admin.edit_user', compact('user'));
  }
  public function create()
  {
    return view('admin.create_user');
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users,email',
      'password' => 'required|string|min:8|confirmed',
    ]);

    User::create($validated);

    return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
  }
  public function update(Request $request, User $user)  
  {
    $validated = $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
    ]);

    $user->update($validated);

    return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
  }

  public function destroy(User $user)
  {
    $user->delete();

    return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
  }
  
  public function posts(User $user)
{
    $posts = $user->posts;

    return view('admin.users.posts', compact('user', 'posts'));
}


}

