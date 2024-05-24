<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class pagos extends Model
{
    use HasFactory;
    public function actividads(){
        return $this->belongsTo(actividad::class);
    }
    public function gym(){
        return $this->belongsTo(gym::class);
    }
    public function clientes(){
        return $this->belongsTo(cliente::class);
    }
    public function tarifas(){
        return $this->belongsTo(tarifa::class,'tarifas_id');
    }
    
    public function suscripcions(){
        return $this->hasMany(suscripcion::class);
    }
    public function movimientos(): HasMany{

        return $this->hasMany(movimiento::class, 'pagoss_id');
    }
}
