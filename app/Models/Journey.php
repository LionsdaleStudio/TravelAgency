<?php

namespace App\Models;

use App\Observers\JourneyObserver;
use App\Policies\JourneyPolicy;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//Megmondom, hogy a journey osztályból létrejövő példányokra melyik policy osztályt kell használni
#[UsePolicy(JourneyPolicy::class)]
/* Melyik osztály figyelje */
#[ObservedBy(JourneyObserver::class)]
class Journey extends Model
{
    /** @use HasFactory<\Database\Factories\JourneyFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [ //Mit tölthet ki a felhasználó
        "name",
        "price",
        "travel_time",
        "visa",
        "description",
        "agency_id"
    ];
    /* Ha eloquent ORM esetén ki kell tölteni */
    /* DB osztály eseténe NEM kell a fillable-t kitölteni */


    /* KAPCSOLATOK - ELOQUENT RELATIONSHIPS */
    public function agency() {
        return $this->belongsTo(Agency::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
