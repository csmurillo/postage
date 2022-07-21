<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    // $posts = auth()->user()->posts->take(3)->get();
    $posts=auth()->user()->posts->take(3);
    return view('account.index',["posts"=>$posts]);
})->middleware('auth');

// settings
Route::get('/settings', function () {
    return view('settings.index');
});
Route::get('/account', function () {
    return view('settings/account/edit');
});
Route::get('/profile/{user}',function(){
    return view('profile');
})->middleware('auth');
// settings routes
Route::get('/account', function () {
    return view('settings/account/edit');
});

Route::get('/changePassword', function () {
    return view('settings/change-password/index');
    // return view('auth/passwords/reset');
});

Route::get('/deleteAccount', function () {
    return view('settings/delete-account/index');
});
// settings routes end

// ->middleware('auth');
// Post url
Route::get('/dashboard',[PostsController::class,'index'])->middleware('auth');
Route::get('/posts/search',[PostsController::class,'search']);
Route::get('/post/create',[PostsController::class,'create'])->middleware('auth');
Route::get('/post/{id}',[PostsController::class,'show']);
Route::get('/post/{post}/edit',[PostsController::class,'edit'])->middleware('auth');
/////////////////////////////////////////////////////
Route::post('/post',[PostsController::class,'store'])->middleware('auth');
Route::patch('/post/{post}',[PostsController::class,'update'])->middleware('auth');
Route::delete('/post/{post}',[PostsController::class,'destroy'])->middleware('auth');

// user
Route::patch('user/{user}',[UserController::class,'update'])->middleware('auth');
Route::patch('updatepassword/{user}',[UserController::class,'updatePassword'])->middleware('auth');
Route::delete('user/{user}',[UserController::class,'destroy'])->middleware('auth');

// profile
Route::patch('/profile/{user}',[ProfileController::class,'update'])->middleware('auth');



// legal
Route::get('/terms/services', function () {
    return view('/legal/terms-services');
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
