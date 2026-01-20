<?php

use App\Http\Controllers\JourneyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/journeys', [JourneyController::class, "sajatFunkcio"])->name("journeys.sajat"); */

Route::resource('/journeys', JourneyController::class);
