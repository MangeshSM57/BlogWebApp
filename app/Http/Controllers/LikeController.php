<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Post $post)
{
    $alreadyLiked = Like::where('user_id', auth()->id())
                        ->where('post_id', $post->id)
                        ->exists();

    if (!$alreadyLiked) {
        Like::create([
            'user_id' => auth()->id(),
            'post_id' => $post->id,
        ]);
    }

    return back();
}}
