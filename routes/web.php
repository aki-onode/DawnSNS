<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FollowsController;


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

Route::group(['prefix' => 'login'], function () {
    Route::get('/', [LoginController::class, 'login'])
        ->name('show.login');
    Route::post('/', [LoginController::class, 'login'])
        ->name('users.login');
});

Route::group(['prefix' => 'register'], function () {
    Route::get('/', [RegisterController::class, 'register'])
        ->name('show.register');
    Route::post('/', [RegisterController::class, 'register'])
        ->name('users.register');
});

Route::get('/added', [RegisterController::class, 'added'])
    ->name('show.added');

Route::get('/top', [PostsController::class, 'index'])
    ->name('user.home');

Route::group(['prefix' => 'post'], function () {
    Route::post('/', [PostsController::class, 'create'])
        ->name('create.posts');
    Route::patch('/edit', [PostsController::class, 'edit'])
        ->name('edit.posts');
    Route::delete('/{id}/delete', [PostsController::class, 'delete'])
        ->name('delete.posts');
});

Route::group(['prefix' => 'profile'], function () {
    Route::get('/', [UsersController::class, 'profile'])
        ->name('user.profile');
    Route::patch('/edit', [UsersController::class, 'edit'])
        ->name('edit.profile');
});

Route::get('/profile/{id}', [UsersController::class, 'show'])
    ->name('show.user');

Route::get('/search', [UsersController::class, 'search'])
    ->name('search.users');

Route::group(['prefix' => 'users/{user}'], function () {
    Route::post('/follow', [UsersController::class, 'follow'])
        ->name('follow.user');
    Route::delete('/unfollow', [UsersController::class, 'unfollow'])
        ->name('unfollow.user');
});

Route::get('/follow-list', [FollowsController::class, 'followList'])
    ->name('follows.list');
Route::get('/follower-list', [FollowsController::class, 'followerList'])
    ->name('followers.list');

Route::get('/logout', [UsersController::class, 'logout'])
    ->name('user.logout');
