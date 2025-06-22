<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/posts', function () {
    return response()->json([
        ['id' => 1, 'title' => 'First Post'],
        ['id' => 2, 'title' => 'Second Post'],
    ]);
});

// Route to handle user registrer
Route::post('/register', [UserController::class, 'store']);
// Route to handle user login
Route::post('/login', [UserController::class, 'login']);

Route::get('/add', [UserController::class, 'index']);
// get the authenticated user from token
Route::get('/user-from-token', [UserController::class, 'userFromToken'])
    ->middleware('auth:sanctum');

Route::post('/articles', [ArticleController::class, 'store'])
    ->middleware('auth:sanctum');
Route::get('/all/articles', [ArticleController::class, 'index']);
Route::get('/articles', [ArticleController::class, 'userArticles'])
    ->middleware('auth:sanctum');
Route::get('/articles/{id}', [ArticleController::class, 'show']);

Route::put('/articles/{id}', [ArticleController::class, 'update'])
    ->middleware('auth:sanctum');

Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])
    ->middleware('auth:sanctum');

// Route to toggle like for an article
Route::post('/like', [\App\Http\Controllers\Api\LikeController::class, 'toggle'])
    ->middleware('auth:sanctum');

// Route to store a comment
Route::post('/comments', [CommentController::class, 'store'])
    ->middleware('auth:sanctum');
// Route to update a comment
Route::put('/comments/{id}', [CommentController::class, 'update'])
    ->middleware('auth:sanctum');
// Route to delete a comment
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])
    ->middleware('auth:sanctum');
