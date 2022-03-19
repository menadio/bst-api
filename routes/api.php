<?php

use App\Http\Controllers\CharacterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\LocationController;


Route::controller(StatusController::class)
    ->prefix('statuses')
    ->group(function ()  {
        Route::get('', 'index');

        Route::post('', 'store');
    });

Route::apiResources([
    'episodes'  => EpisodeController::class,
]);

Route::get('episodes/{episode}/comments', [CommentController::class, 'index']);

Route::post('episodes/{episode}/comments', [CommentController::class, 'store']);

Route::get('locations', [LocationController::class, 'index']);

Route::get('characters', [CharacterController::class, 'index']);

Route::get('characters/{character}/episodes', [CharacterController::class, 'episodes']);