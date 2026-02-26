<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\AuthController;
use App\http\controllers\Api\CommentController;
use App\Http\Controllers\Api\LiketController;

Route::get('/posts', [PostController::class, 'index']);


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/posts/{post}/comment', [CommentController::class, 'store']);
Route::get('/posts/{post}/comments', [CommentController::class, 'index']);

//Route::get('/post/{post}/likes', [LikeController::class, ''])

Route::post('/posts/{post}/like', [LiketController::class, 'like']);
Route::delete('/posts/{post}/like', [LiketController::class, 'unlike']);
Route::get('/posts/{post}/likes', [LiketController::class, 'count']);