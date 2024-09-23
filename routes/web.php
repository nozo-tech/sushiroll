<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RollController;
use App\Http\Controllers\LiveController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

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

Route::get('/', fn () =>
    auth()->check()
        ? to_route('home')
        : to_route('welcome')
)->name('index');

Route::get('/home', fn () => inertia('Home'))->name('home');
Route::get('/welcome', fn () => inertia('Welcome'))->name('welcome');

Route::get('/register', fn () => inertia('Users/Register'))->name('register');
Route::get('/login', fn () => inertia('Users/Login'))->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::resource('users', UserController::class);
Route::resource('channels', ChannelController::class);
Route::resource('groups', GroupController::class);
Route::resource('communities', CommunityController::class);

Route::resource('rolls', RollController::class);
// Route::resource('lives', LiveRollController::class);
Route::resource('threads', ThreadController::class);
// Route::resource('users.threads', ThreadController::class)->name('users.threads');
// Route::resource('communities.threads', ThreadController::class)->name('communities.threads');

// Route::middleware(['auth:sanctum', 'verified'])->group(function () {
// });
