<?php

use App\Http\Controllers\JourneyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/journeys', [JourneyController::class, "index"])->name("journeys.index"); */

Route::resource('/journeys', JourneyController::class);
