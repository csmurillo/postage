<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// Main
Route::get('/', function () {
    return view('welcome');
});

// User Home
Route::get('/home', function () {
    $user_id=auth()->user()->id;
    $posts=Post::latest()->where('user_id',$user_id)->take(3)->get();
    return view('account.index',["posts"=>$posts]);
})->middleware('auth');

// Update User Profile
Route::patch('/profile/{user}',[ProfileController::class,'update'])->middleware('auth');

// User Profile
Route::get('/profile/{id}',function($id){
    $user = User::findOrFail($id);   
    $posts = $user->posts;
    return view('profile',['user' => $user,'posts' => $posts]);
});

// Search Post
Route::get('/posts/search',[PostsController::class,'search']);

// Post Templates
Route::get('/dashboard',[PostsController::class,'index'])->middleware('auth');
Route::get('/post/{id}',[PostsController::class,'show']);
Route::get('/post/create',[PostsController::class,'create'])->middleware('auth');
Route::get('/post/{post}/edit',[PostsController::class,'edit'])->middleware('auth');

// Post Actions
Route::post('/post',[PostsController::class,'store'])->middleware('auth');
Route::patch('/post/{post}',[PostsController::class,'update'])->middleware('auth');
Route::delete('/post/{post}',[PostsController::class,'destroy'])->middleware('auth');

// User Account updates/delete
Route::patch('user/{user}',[UserController::class,'update'])->middleware('auth');
Route::patch('updatepassword/{user}',[UserController::class,'updatePassword'])->middleware('auth');
Route::delete('user/{user}',[UserController::class,'destroy'])->middleware('auth');

// settings
Route::get('/settings', function () {
    return view('settings.index');
});

// settings routes
Route::get('/account', function () {
    return view('settings/account/edit');
});

Route::get('/changePassword', function () {
    return view('settings/change-password/index');
});

Route::get('/deleteAccount', function () {
    return view('settings/delete-account/index');
});

// company
Route::get('/about', function () {
    return view('/company/about-us');
});
Route::get('/team', function () {
    return view('/company/team');
});
Route::get('/careers', function () {
    return view('/company/careers');
});

// legal
Route::get('/terms/services', function () {
    return view('/legal/terms-services');
});
