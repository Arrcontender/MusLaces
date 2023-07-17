<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\GenresGroupController;
use App\Http\Controllers\Api\MusicianController;
use App\Http\Controllers\Api\PlaceController;
use App\Http\Controllers\Api\UserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('genres',GenreController::class);
Route::apiResource('genre_groups',GenresGroupController::class);
Route::apiResource('musicians', MusicianController::class);
Route::apiResource('places', PlaceController::class);
Route::apiResource('users', UserController::class);
