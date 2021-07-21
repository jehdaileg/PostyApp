<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;


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


Route::get('/', function(){

    return view('home');

})->name('home');

/*Route::get('/dashboard', function(){
    return view('dashboard');
})->name('dashboard'); */

Route::get('/dashboard', [DashBoardController::class, 'index'])->name('dashboard');

//Authentification
//--Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

//--Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'storeLog']);

//--Logout
Route::post('/logout', [LogoutController::class, 'index'])->name('logout');

//Post Management

Route::get('/posts', [PostController::class, 'index'])->name('posts');

Route::post('/posts', [PostController::class, 'store']);

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

//--likes and unlike management with user_id and post_id
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.like');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.like');

//--User view management
Route::get('/users/{user:name}/posts', [UserPostController::class, 'index'])->name('users.post');

