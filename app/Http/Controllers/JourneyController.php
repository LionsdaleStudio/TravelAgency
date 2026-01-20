<?php

namespace App\Http\Controllers;

use App\Models\Journey;
use App\Http\Requests\StoreJourneyRequest;
use App\Http\Requests\UpdateJourneyRequest;

class JourneyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $journeys = Journey::all(); //Eloquent modell - Lekéri az összes journeys összes sorát
        return view("journeys.index",["journeys" => $journeys]);
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
        //
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
        //
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
