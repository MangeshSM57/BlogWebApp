<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $posts = Post::with('user')->get();                  //all();
    return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $imagePath = null;

    if($request->hasFile('image')){
        $imagePath = $request->file('image')->store('posts','public');
    }

    Post::create([
        
        'title' => $request->title,
        'content' => $request->content,
        'image' => $imagePath,
        'user_id' => auth()->id()   // 🔥 THIS IS IMPORTANT
    ]);

    return redirect()->route('posts.index');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
         if ($post->user_id !== auth()->id()) {
        abort(403);
    }
    return view('posts.edit', compact('post'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
    $post->update($request->all());
    return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
    return view('posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->user_id !== auth()->id()) {
        abort(403, "You can't delete others' posts."); // Unauthorized
    }

    $post->delete();

    return redirect()->back()->with('success', 'Post deleted');
    
    }
}
