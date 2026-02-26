<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Like;

class LiketController extends Controller
{
    // ❤️ Like Post
    public function like($postId)
    {
        $userId = 1; // temporary (later auth()->id())

        // Duplicate like prevent
        $alreadyLiked = Like::where('post_id', $postId)
                            ->where('user_id', $userId)
                            ->first();

        if ($alreadyLiked) {
            return response()->json([
                'message' => 'You already liked this post'
            ], 409);
        }

        Like::create([
            'post_id' => $postId,
            'user_id' => $userId
        ]);

        return response()->json([
            'message' => 'Post liked successfully'
        ], 200);
    }

    // 💔 Unlike Post
    public function unlike($postId)
    {
        $userId = 1;

        Like::where('post_id', $postId)
            ->where('user_id', $userId)
            ->delete();

        return response()->json([
            'message' => 'Post unliked successfully'
        ], 200);
    }

    // 👍 Like Count
    public function count($postId)
    {
        $count = Like::where('post_id', $postId)->count();

        return response()->json([
            'likes_count' => $count
        ], 200);
    }
}