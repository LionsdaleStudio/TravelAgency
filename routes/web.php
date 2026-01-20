<?php

use App\Http\Controllers\JourneyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/journeys', [JourneyController::class, "sajatFunkcio"])->name("journeys.sajat"); */


//Saját útvonal mindig előbb jön, mint a resource
Route::get('/journeys/showTrashed', [JourneyController::class, "showTrashed"])->name("journeys.showTrashed");
Route::post('/journeys/{journey}/restore', [JourneyController::class, "restore"])->withTrashed()->name("journeys.restore"); //With trashed azért kell, hogy a törölt elemmel is foglalkozzon az útvonal
Route::resource('/journeys', JourneyController::class);
