<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TweetsController; // (57)
use App\Http\Controllers\ProfilesController; // (60)
use App\Http\Controllers\FollowsController; // (62)
use App\Http\Controllers\ExploreController; // (65)
use App\Http\Controllers\TweetLikesController; // (67)

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

Route::get('/', function () {
    return view('welcome');
});

// need to be authenticated to proceed, otherwise, redirects to login page
Route::middleware(['auth'])->group(function () {
    Route::get('/tweets', [TweetsController::class, 'index'])->name('home');
    Route::post('/tweets', [TweetsController::class, 'store']); // storing tweets after post request in form

    Route::post('/tweets/{tweet}/like', [TweetLikesController::class, 'store']);  // request to like a tweet (67)
    Route::delete('/tweets/{tweet}/like', [TweetLikesController::class, 'destroy']);  // request to destory(delete) a like to a tweet (67)

    Route::post('/profiles/{user:username}/follow', [FollowsController::class, 'store'])->name('follow'); //updated name('follow') in (65) // storing follow after post request (62)

    Route::get('/profiles/{user:username}/edit', [ProfilesController::class, 'edit'])  // route for editing profile with authorization check
        ->middleware('can:edit,user'); // as an argument in middleware(can:edit) we write the name of the wildcard (63)

    Route::patch('/profiles/{user:username}', [ProfilesController::class, 'update'])
        ->middleware('can:edit,user');

    // Route::get('/explore', [ExploreController::class, 'index']);  // (65) Initial ExploreController
    Route::get('/explore', ExploreController::class);   // (66) Changing for invokable controller. Invokable controller - a controller that has a single action
});

Route::get('/profiles/{user:username}', [ProfilesController::class, 'show'])->name('profile');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
