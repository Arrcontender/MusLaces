<?php

use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\GenresGroupController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MusicianController;
use App\Http\Controllers\Admin\PlaceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['role:admin'])->prefix('admin_panel')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::resource('genre', GenreController::class);
    Route::resource('genres_group', GenresGroupController::class);
    Route::resource('musician', MusicianController::class);
    Route::resource('place', PlaceController::class);
    Route::resource('user', UserController::class);
});


require __DIR__.'/auth.php';
