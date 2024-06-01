<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\TweetLikesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\NotificationController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){
	Route::get('/tweet',[TweetController::class,'index'])->name('home');
    Route::post('/tweet',[TweetController::class,'store']);
    Route::get('/profiles/{user:username}',[ProfileController::class,'show'])->name('profile');
    Route::post('/profiles/{user:username}/follow',[FollowsController::class,'store']);
    Route::post('/followback/{user}', [FollowsController::class, 'followBack'])->name('followback');
    Route::get('/profiles/{user:username}/edit',[ProfileController::class,'edit'])->middleware('can:edit,user');
    Route::patch('/profiles/{user:username}',[ProfileController::class,'update'])->middleware('can:edit,user')->name('profile');

    Route::post('/tweets/{tweet}/like', [TweetLikesController::class,'store']);
    Route::delete('/tweets/{tweet}/like', [TweetLikesController::class,'destroy']);
    Route::get('/explore',[ExploreController::class,'index']);
});

Route::post('/tweets/{tweet}/bookmark', [BookmarkController::class, 'store'])->name('tweets.bookmark');
Route::get('/bookmarks', [BookmarkController::class, 'index'])->name('bookmarks');

Route::get('/notifications', [NotificationController::class, 'index'])->middleware('auth');
Route::get('followers/{user}', [FollowsController::class, 'followers'])->name('followers');
Route::get('following/{user}', [FollowsController::class, 'following'])->name('following');



Auth::routes();


