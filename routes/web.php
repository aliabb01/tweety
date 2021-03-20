<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TweetsController; // (57)
use App\Http\Controllers\ProfilesController; // (60)
use App\Http\Controllers\FollowsController; // (62)



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

    Route::post('/profiles/{user:name}/follow', [FollowsController::class, 'store']); // storing follow after post request (62)
});

Route::get('/profiles/{user:name}', [ProfilesController::class, 'show'])->name('profile');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
