<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;


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

Route::get('/login', [LoginController::class, 'login'])->name('show.login');
Route::post('/login', [LoginController::class, 'login'])->name('users.login');

Route::get('/register', [RegisterController::class, 'register'])->name('show.register');
Route::post('/register', [RegisterController::class, 'register'])->name('users.register');

Route::get('/added', [RegisterController::class, 'added'])->name('show.added');

//ログイン中のページ
Route::get('/top', [PostsController::class, 'index'])->name('user.home');

Route::get('/profile', 'UsersController@profile');

Route::get('/search', 'UsersController@index');

Route::get('/follow-list', 'PostsController@index');
Route::get('/follower-list', 'PostsController@index');

Route::get('/logout', [UsersController::class, 'logout'])->name('user.logout');
