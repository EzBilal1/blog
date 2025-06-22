<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/post', function () {
    return view('post.index');
})->name('post.index');


Route::get('/getAllPosts', [PostController::class, 'index']);
Route::get('/login', [UserController::class, 'showLogin']);

Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [UserController::class, 'register'])->name('register.submit');
