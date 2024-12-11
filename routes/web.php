<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/viewPost', function () {
    return view('view_post');
})->name('viewPost');

Route::get('/newPost', function () {
    return view('new_post');
})->name('newPost');

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
