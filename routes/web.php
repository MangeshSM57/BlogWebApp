<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LikeController;


Route::get('/register', [AuthController::class,'showRegister']);
Route::post('/register', [AuthController::class,'register'])->name('register');

Route::get('/login', [AuthController::class,'showLogin'])->name('login');
Route::post('/login', [AuthController::class,'login'])->name('login');

Route::post('/logout', [AuthController::class,'logout'])->name('logout');

Route::get('/', [PostController::class, 'index']);


Route::resource('posts', PostController::class)->middleware('auth');

Route::post('/posts/{post}/comments',
    [CommentController::class,'store'])->name('comments.store');

Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::get('/profile', [ProfileController::class, 'show'])
    ->name('profile')
    ->middleware('auth');

Route::put('/profile/update', [ProfileController::class, 'update'])
    ->name('profile.update')
    ->middleware('auth');

Route::post('/posts/{post}/like', [LikeController::class, 'like'])
    ->middleware('auth')
    ->name('posts.like');