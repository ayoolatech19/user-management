<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = auth()->user()->posts;
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        auth()->user()->posts()->create($validated);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post->update($validated);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }

    // API PostController.php
public function apiIndex()
{
    return response()->json(Post::all());
}

public function apiStore(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'body'  => 'required|string',
    ]);

    $post = Post::create([
        'title'   => $validated['title'],
        'body'    => $validated['body'],
        'user_id' => auth()->id(), // whoever is authenticated
    ]);

    return response()->json($post, 201);
}
public function apiShow($id)
{
    $post = Post::findOrFail($id);

    return response()->json($post);
}

 public function  apiupdate(Request $request, $id)
    {
  $post = Post::findOrFail($id);


    if ($post->user_id !== auth()->id()) {
        return response()->json(['message' => 'Forbidden'], 403);
    }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post->update($validated);
       
        return response()->json($post);
    }

 public function  apidestroy($id)
    {
  $post = Post::findOrFail($id);


    if ($post->user_id !== auth()->id()) {
        return response()->json(['message' => 'Forbidden'], 403);
    }


        $post->delete();
       
        return response()->json(['message'=>'Post deleted successfully']);
    }

    public function apiAdminDestroy($id)
{
    $post = Post::findOrFail($id);

    $post->delete();

    return response()->json(['message' => 'Post deleted by admin']);
}


}