<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
class CommentController extends Controller
{
    public function store(Request $request, Post $post)
{
    $request->validate([
        'comment' => 'required|string'
    ]);

    $comment = Comment::create([
        'comment' => $request->comment,
        'post_id' => $post->id
    ]);

    return response()->json([
        'message' => 'Comment added successfully',
        'data' => $comment
    ], 201);
}

public function index(Post $post)
{
    return response()->json([
        'data' => $post->comments
    ], 200);
}
}