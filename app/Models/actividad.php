<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class actividad extends Model
{
    use HasFactory;
    public function gym(){
        return $this->belongsTo(gym::class);
    }
    public function actividadentrenador(): HasMany{

        return $this->hasMany(actividadentrenador::class);
    }
    public function entrenadors(){
        return $this->belongsTo(entrenador::class);
    }
    public function suscripcions(){
        return $this->hasMany(suscripcion::class);
    }
    public function tarifas(){
        return $this->hasMany(tarifa::class);
    }

}
