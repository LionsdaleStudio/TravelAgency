<?php

namespace App\Models;

use App\Policies\JourneyPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//Megmondom, hogy a journey osztályból létrejövő példányokra melyik policy osztályt kell használni
#[UsePolicy(JourneyPolicy::class)]
class Journey extends Model
{
    /** @use HasFactory<\Database\Factories\JourneyFactory> */
    use HasFactory;
    use SoftDeletes;

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
