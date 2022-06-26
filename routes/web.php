<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;

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
    return view('account.index');
});

// settings
Route::get('/settings', function () {
    return view('settings.index');
});
// settings routes
Route::get('/account', function () {
    return view('settings/account/index');
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
Route::get('/dashboard',[PostsController::class,'index']);
Route::get('/posts/search',[PostsController::class,'search']);
Route::get('/post/create',[PostsController::class,'create']);
Route::get('/post/{id}',[PostsController::class,'show']);
Route::get('/post/{id}/edit',[PostsController::class,'edit']);
/////////////////////////////////////////////////////
Route::post('/post',[PostsController::class,'store']);
Route::put('/post/{id}',[PostsController::class,'update']);
Route::delete('/post/{id}',[PostsController::class,'destroy']);

// user
Route::put('user/update',[UserController::class,'update']);



















