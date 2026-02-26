<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;


class PostController extends Controller
{
    public function index()
    {
        return response()->json(Post::all());
    }

public function store(Request $request)
{
    $post = Post::create([
        'title' => $request->title,
        'content' => $request->content,
    ]);

    return response()->json($post, 201);
}

public function show($id)
{
    return Post::findOrFail($id);
}

public function update(Request $request, $id)
{
    $post = Post::findOrFail($id);

    $post->update([
        'title' => $request->title,
        'content' => $request->content,
    ]);

    return response()->json($post);
}

public function destroy($id)
{
    Post::findOrFail($id)->delete();

    return response()->json([
        "message" => "Post deleted"
    ]);
}

}