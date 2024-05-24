<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    use HasFactory;
    public function gym(){
        return $this->belongsTo(gym::class);
    }
    
    public function users(){
        return $this->belongsTo(user::class,'users_id');
    }
    public function suscripcions(){
        return $this->hasMany(suscripcion::class);
    }
    public function pagoss(){
        return $this->hasMany(pagos::class);
    }
    public function visitas(){
        return $this->hasMany(visita::class);
    }
    public function ventas(): HasMany{

        return $this->hasMany(venta::class);
    }
    public function facturas(): HasMany{

        return $this->hasMany(factura::class);
    }
}
