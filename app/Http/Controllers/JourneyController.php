<?php

namespace App\Http\Controllers;

use App\Models\Journey;
use App\Http\Requests\StoreJourneyRequest;
use App\Http\Requests\UpdateJourneyRequest;
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
        return view("journeys.create");
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Journey $journey)
    {
        //
    }
}
