<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RollController;
use App\Http\Controllers\LiveRollController;
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
        ? redirect()->route('home')
        : redirect()->route('welcome')
)->name('index');

Route::get('/home', fn () => inertia('Home'))->name('home');
Route::get('/welcome', fn () => inertia('Welcome'))->name('welcome');

Route::get('/login', fn () => inertia('Users/Login'))->name('login');
Route::post('/login', function (Request $request) {
    if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->input('remember'))) {
        return redirect()->route('home');
    }

    return back()->withErrors(['login' => 'The provided credentials do not match our records.']);
})->name('login');
Route::get('/register', fn () => inertia('Users/Register'))->name('register');

// Route::get('/users/threads', [UserController::class, 'threads'])->name('users.threads');
Route::resource('users', UserController::class);
// Route::resource('groups', GroupController::class);
Route::resource('channels', ChannelController::class);
Route::resource('communities', CommunityController::class);
// Route::resource('communities.threads', ThreadController::class);

Route::resource('rolls', RollController::class);
// Route::resource('lives', LiveRollController::class);
Route::resource('threads', ThreadController::class);

// Route::middleware(['auth:sanctum', 'verified'])->group(function () {

// });
