<?php

use App\Http\Controllers\Admin\CastController;
use App\Http\Controllers\Admin\EpisodeController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\MovieAttachController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\SeasonController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TvShowController;
use App\Http\Controllers\Frontend\CastController as FrontendCastController;
use App\Http\Controllers\Frontend\GenreController as FrontendGenreController;
use App\Http\Controllers\Frontend\MovieController as FrontendMovieController;
use App\Http\Controllers\Frontend\TagController as FrontendTagController;
use App\Http\Controllers\Frontend\TvShowController as FrontendTvShowController;
use App\Http\Controllers\Frontend\WelcomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::middleware(['auth:sanctum', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function (){return Inertia::render('Admin/Index');})->name('index');
    Route::resource('/movies', MovieController::class);
    Route::resource('/tv-shows', TvShowController::class);
    Route::resource('/tv-shows/{tv_show}/seasons', SeasonController::class);
    Route::resource('/tv-shows/{tv_show}/seasons/{season}/episodes', EpisodeController::class);
    Route::resource('/genres', GenreController::class);
    Route::resource('/casts', CastController::class);
    Route::resource('/tags', TagController::class);
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        // auth()->user()->assignRole('admin');
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
