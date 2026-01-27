<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Journey;
use App\Http\Requests\StoreJourneyRequest;
use App\Http\Requests\UpdateJourneyRequest;
use App\Models\User;
use DB;

class JourneyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $journeys = Journey::all(); //Eloquent modell - Lekéri az összes journeys összes sorát
        return view("journeys.index", ["journeys" => $journeys]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agencies = Agency::all();
        return view("journeys.create", ["agencies" => $agencies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJourneyRequest $request)
    {
        /* Ha minden input mező tökéletes */
        /* Modellnél ki kell tölteni a $fillable örökölt változó tömbjét az oszlopok nevével */
        Journey::create($request->all());

        /*Adatbázis osztály használatával, E-ORM nélkül
        DB::table("journeys")->insert($request->all()); */

        /* Hozzáadás osztálypéldány létrehozásával és mentésével */
        /* $uj_ut = new Journey();
        $uj_ut->name = $request->name;
        $uj_ut->visa = true;
        $uj_ut->save(); vagy $uj_ut->create(); */


        /* Visszairányítás oda ahonnan jöttem */
        //return back()->with("msg", "Hozzáadás sikeres.");

        /* Tovább vagy átirányítás */
        return redirect()->route("journeys.index")->with("msg", "Destination added successfuly");
    }

    /**
     * Display the specified resource.
     */
    public function show(Journey $journey)
    {
        return view('journeys.show', ["journey" => $journey]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Journey $journey)
    {
        return view("journeys.edit", ["journey" => $journey]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJourneyRequest $request, Journey $journey)
    {
        $journey->update($request->all());
        return redirect()->route("journeys.index")->with("msg", "{$journey->name} was updated successfuly");

        //Direkt módosítás
        /* $journey->name = $request->name;
        ...
        $journey->update(); */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Journey $journey)
    {
        $journey->delete(); //A modell osztálynak meg kell mondani, hogy használja a SoftDeletes osztályt, különben teljes törlés lesz, a softDelete helyett.
        return redirect()->route("journeys.index")->with("msg", "{$journey->name} was deleted successfuly");
    }

    public function showTrashed()
    {
        //Átirányítás, ha nincs bejelentkezve
        if (auth()->check() == false) {
            return redirect()->route('login');
        }

        /* Amennziben a bejelentkezett user nem tud valamit, error kód */
        if (auth()->user()->cannot("showTrashed", Journey::class)) {
            abort(403);
        }

        $journeys = Journey::onlyTrashed()->get(); //Eloquent modell - Lekéri az összes deleted_at oszlopban NEM null értékkel rendelkező journeys összes oszlopát
        return view("journeys.index", ["journeys" => $journeys]);
    }

    public function restore(Journey $journey)
    {
        $journey->restore(); //Lényegében törli a deleted_at mező értéket és null-ra állítja
        return back()->with("msg", "{$journey->name} was restored successfuly");
    }

    public function userJourneys() {
        if (auth()->check() == false) {
            return redirect()->route("login");
        }
        else {
            return view("journeys.userJourneys");
        }
    }
}
