<?php

use App\Http\Controllers\JourneyController;
use App\Models\Journey;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/journeys', [JourneyController::class, "sajatFunkcio"])->name("journeys.sajat"); */


//Saját útvonal mindig előbb jön, mint a resource
Route::get('/journeys/showTrashed', [JourneyController::class, "showTrashed"])->name("journeys.showTrashed")->can("showTrashed", Journey::class);
//A can funkció ellenőrzi, hogy az adott user jogosult-e arra, hogy meglátogassa az útvonalat a policy alapján


Route::get('/journeys/userJourneys', [JourneyController::class, "userJourneys"])->name("journeys.userJourneys");
Route::post('/journeys/{journey}/restore', [JourneyController::class, "restore"])->withTrashed()->name("journeys.restore"); //With trashed azért kell, hogy a törölt elemmel is foglalkozzon az útvonal

//A controller resource funkcióira magától csinál útvonalakat (index, create, store, edit, update, show, destroy)
Route::resource('/journeys', JourneyController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
