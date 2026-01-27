<?php

namespace App\Observers;

use App\Models\Journey;

class JourneyObserver
{
    /**
     * Handle the Journey "created" event.
     */
    /* A múltidőben lévő funkció akkor fut le, ha már befejeződött az akció */
    /* Az ing PONT AZ ELŐTT fut le, hogy befejeződött a funkció */
    public function creating(Journey $journey): void 
    {
        $journey->created_by = auth()->user()->id;
    }

    /**
     * Handle the Journey "updated" event.
     */
    public function updating(Journey $journey): void
    {
        //
    }

    /**
     * Handle the Journey "deleted" event.
     */
    public function deleting(Journey $journey): void
    {
        //
    }

    /**
     * Handle the Journey "restored" event.
     */
    public function restored(Journey $journey): void
    {
        //
    }

    /**
     * Handle the Journey "force deleted" event.
     */
    public function forceDeleted(Journey $journey): void
    {
        //
    }
}
