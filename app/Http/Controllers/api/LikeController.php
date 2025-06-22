<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Article;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    // Toggle like for an article
    public function toggle(Request $request)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
        ]);
        $user = auth('sanctum')->user();
        $userId = $user ? $user->id : null;
        $articleId = $request->article_id;

        $like = Like::where('user_id', $userId)->where('article_id', $articleId)->first();
        if ($like) {
            $like->delete();
            return response()->json(['liked' => false, 'message' => 'Like removed']);
        } else {
            Like::create([
                'user_id' => $userId,
                'article_id' => $articleId,
            ]);
            return response()->json(['liked' => true, 'message' => 'Article liked']);
        }
    }
}
