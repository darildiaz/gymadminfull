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

        return $this->hasMany(actividadentrenador::class,'actividads_id');
    }
    public function entrenadors(){
        return $this->hasMany(entrenador::class);
    }
    public function suscripcions(){
        return $this->hasMany(suscripcion::class,'actividads_id');
    }
    public function tarifas(){
        return $this->hasMany(tarifa::class);
    }
    public function rutinas(){
        return $this->hasMany(rutina::class);
    }
    public function visitas(){
        return $this->hasMany(visita::class);
    }
    public function getSuscriptosCountAttribute()
    {
        return $this->suscripcions()->count();
    }
}
