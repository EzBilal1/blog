<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ArticleController extends Controller
{
    public function index()
    {
        try {
            $user = auth('sanctum')->user();

            $articles = Article::with([
                'user:id,firstname,lastname,photo_profile',
                'likes:id'
            ])
                ->withCount(['likes', 'comments'])
                ->latest()
                ->get()
                ->map(function ($article) use ($user) {
                    // إزالة pivot
                    $article->likes->makeHidden('pivot');

                    // إضافة isLiked
                    if ($user) {
                        $article->isLiked = $article->likes->contains('id', $user->id);
                    }

                    return $article;
                });

            return response()->json($articles);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Error fetching articles',
                'error' => $e->getMessage()
            ], 500);
        }
    }




    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'title' => 'required|string|max:100',
                'subtitle' => 'nullable|string',
                'content' => 'required|string',
                'image' => 'nullable|string',
                'image_alt' => 'nullable|string',
                'tags' => 'nullable|array',
                'tags.*' => 'string',
                'category' => 'nullable|string',
                'meta_description' => 'nullable|string|max:160',
                'focus_keyword' => 'nullable|string',
                'allow_comments' => 'boolean',
                'featured' => 'boolean',
                'email_notify' => 'boolean',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }

        $user = auth('sanctum')->user();
        $data['user_id'] = $user?->id;
        if (isset($data['tags'])) $data['tags'] = json_encode($data['tags']);

        try {
            $article = Article::create($data);
            return response()->json($article, 201);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Error creating article', 'error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $article = Article::with([
                'user:id,firstname,lastname,photo_profile',
                'likes:id,firstname,lastname,photo_profile',
                'comments.user:id,firstname,lastname,photo_profile'
            ])
                ->withCount(['likes', 'comments'])
                ->findOrFail($id);

            $article->likes->makeHidden('pivot');

            return response()->json($article);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Article not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }


    public function update(Request $request, $id)
    {
        $user = auth('sanctum')->user();

        try {
            $article = Article::findOrFail($id);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Article not found'], 404);
        }

        if ($article->user_id !== $user?->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        try {
            $data = $request->validate([
                'title' => 'sometimes|required|string|max:100',
                'subtitle' => 'nullable|string',
                'content' => 'sometimes|required|string',
                'image' => 'nullable|string',
                'image_alt' => 'nullable|string',
                'tags' => 'nullable|array',
                'tags.*' => 'string',
                'category' => 'nullable|string',
                'meta_description' => 'nullable|string|max:160',
                'focus_keyword' => 'nullable|string',
                'allow_comments' => 'boolean',
                'featured' => 'boolean',
                'email_notify' => 'boolean',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }

        if (isset($data['tags'])) $data['tags'] = json_encode($data['tags']);

        try {
            $article->update($data);
            return response()->json($article);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Update failed', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        $user = auth('sanctum')->user();

        try {
            $article = Article::findOrFail($id);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Article not found'], 404);
        }

        if ($article->user_id !== $user?->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        try {
            $article->delete();
            return response()->json(['message' => 'Deleted successfully']);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Delete failed', 'error' => $e->getMessage()], 500);
        }
    }

    public function userArticles(Request $request)
    {
        $user = auth('sanctum')->user();

        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        try {
            $articles = Article::where('user_id', $user->id)->latest()->get();
            return response()->json($articles);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Error fetching user articles', 'error' => $e->getMessage()], 500);
        }
    }
}
