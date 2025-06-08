<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RollController;
// use App\Http\Controllers\LiveController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\UserController;
use App\Models\Channel;
use App\Models\Community;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    Auth::check()
        ? to_route('home')
        : to_route('welcome')
)->name('index');

Route::get('/home', fn () => inertia('Home'))->name('home');
Route::get('/welcome', fn () => inertia('Welcome'))->name('welcome');

// Markdown routes
Route::get('/terms-of-service', fn () => inertia('StaticPage', ['page' => file_get_contents(resource_path('md/terms-of-service.md'))]))->name('terms-of-service');
Route::get('/privacy-policy', fn () => inertia('StaticPage', ['page' => file_get_contents(resource_path('md/privacy-policy.md'))]))->name('privacy-policy');
Route::get('/alpha-test', fn () => inertia('StaticPage', ['page' => file_get_contents(resource_path('md/alpha-test.md'))]))->name('alpha-test');

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

Route::get('/u/{h}', fn (string $h) => to_route('users.show', User::firstWhere('handle', $h)))->name('users.quick');
Route::get('/g/{h}', fn (string $h) => to_route('groups.show', Group::firstWhere('handle', $h)))->name('groups.quick');
Route::get('/ch/{h}', fn (string $h) => to_route('channels.show', Channel::firstWhere('handle', $h)))->name('channels.quick');
Route::get('/co/{h}', fn (string $h) => to_route('communities.show', Community::firstWhere('handle', $h)))->name('communities.quick');
