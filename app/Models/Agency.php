<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    /** @use HasFactory<\Database\Factories\AgencyFactory> */
    use HasFactory;

    //Ha pontosan egy darab modell van aki az agency idegenkulcsával rendelkezik, az elsőt adja vissza csak
    public function journey()
    {
        return $this->hasOne(Journey::class);
    }

    //Ha több van akkor hasMany (array return)
    public function journeys() {
        return $this->hasMany(Journey::class);
    }
}
