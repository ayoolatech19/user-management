<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
  public function show()
{
    $user = Auth()->user();
    return view('profile.show', compact('user'));
}  

    public function edit()
    {
        $user = Auth()->user();
        return view('profile.edit', compact('user'));
    }
    public function update(Request $request)
    {
        $user = Auth()->user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only('name', 'email'));

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
    public function destroy()
    {
        $user = Auth()->user();
        $user->delete();

        Auth::logout();

        return redirect('/')->with('success', 'Your account has been deleted.');
    }
}
