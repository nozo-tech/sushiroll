<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RollController;
use App\Http\Controllers\LiveRollController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () { return inertia('Welcome'); })->name('welcome');

Route::get('/login', function () { return inertia('Login'); })->name('login');
Route::get('/register', function () { return inertia('Register'); })->name('register');

Route::resource('/users', UserController::class);
Route::resource('/groups', GroupController::class);
Route::resource('/channels', ChannelController::class);
Route::resource('/communities', CommunityController::class);

Route::resource('/rolls', RollController::class);
Route::resource('/lives', LiveRollController::class);
Route::resource('/threads', ThreadController::class);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/feed', function () { return inertia('Feed'); })->name('feed');
});
