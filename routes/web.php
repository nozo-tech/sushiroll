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
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

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

/*
|--------------------------------------------------------------------------
| Quick Routes
|--------------------------------------------------------------------------
|
| These routes are used to quickly share a link and navigate to a resource by its handle.
|
*/

Route::get('/u/{handle}', function ($handle) {
    return to_route('channels.show', \App\Models\User::firstWhere('handle', $handle));
})->name('users.quick');

Route::get('/ch/{handle}', function ($handle) {
    return to_route('channels.show', \App\Models\Channel::firstWhere('handle', $handle));
})->name('channels.quick');

Route::get('/g/{handle}', function ($handle) {
    return to_route('channels.show', \App\Models\Group::firstWhere('handle', $handle));
})->name('groups.quick');

Route::get('/co/{handle}', function ($handle) {
    return to_route('channels.show', \App\Models\Community::firstWhere('handle', $handle));
})->name('communities.quick');
