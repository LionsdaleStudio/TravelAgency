<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
    /** @use HasFactory<\Database\Factories\JourneyFactory> */
    use HasFactory;

    protected $fillable = [
        "name",
        "price",
        "travel_time",
        "visa",
        "description"
    ];
    /* Ha eloquent ORM esetén ki kell tölteni */

    /* DB osztály eseténe NEM kell a fillable-t kitölteni */
}
