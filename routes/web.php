<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// })->name('index');


Route::get('/viewPost/{id}', [PostController::class, 'viewPost'])->name('viewPost');

Route::get('/newPost', function () {
    return view('new_post');
})->name('newPost');


Route::get('/newPost', [PageController::class, 'newPost'])->name('newPost');

Route::get('/signin', function(){
    return view('signin');
})->name('signin');


Route::get('/signup', function(){
    return view('signup');
})->name('signup');


Route::get('/search', function(){
    return view('search');
})->name('search');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', PostController::class);

Route::get('/', [PageController::class,'index'])->name("index");
// routes/web.php
// Route::post('/posts/{post}/like', [PostController::class, 'likePost'])->name('posts.like');
Route::post('/like/{post_id}/{user_id}', [PostController::class, 'likePost']);

Route::post('/comment', [PostController::class, 'commentOnPost']);

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/auth/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('/auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);

Route::get('/post/{postId}/count', [PostController::class, 'getCounts']);

// Route to fetch comments for a specific post
Route::get('/get-comments/{postId}', [PostController::class, 'getCommentsByPost']);

Route::get('/hasLike/{postId}/{userId}', [PostController::class, 'hasLike']);

