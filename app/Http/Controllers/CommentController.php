<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{

    public function store(Request $request, Post $post)
{
    Comment::create([
        'comment' => $request->comment,
        'post_id' => $post->id
    ]);

    return back();
}
}

/*<?php

use App\Models\Comment;
use App\Models\Post;

public function store(Request $request, Post $post)
{
    Comment::create([
        'comment' => $request->comment,
        'post_id' => $post->id
    ]);

    return back();
}
    */