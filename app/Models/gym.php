<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class gym extends Model
{
    use HasFactory;
    public function members(){
        return $this->belongsToMany(User::class,'gym_user','gym_id','user_id');
    }

    public function categorias()
    {
        return $this->belongsTo(categoria::class,'categorias_id');
    }
    public function users(){
        return $this->hasMany(user::class);
    }
    public function gym_user(): HasMany{

        return $this->hasMany(gym_user::class);
    }

    public function actividads(){
        return $this->hasMany(actividad::class);
    }
    public function clientes(){
        return $this->hasMany(cliente::class);
    }
    public function entrenadors(){
        return $this->hasMany(entrenador::class);
    }
    public function suscripcions(){
        return $this->hasMany(suscripcion::class);
    }
    public function tarifas(){
        return $this->hasMany(tarifa::class);
    }
    public function pagoss(){
        return $this->hasMany(pagos::class);
    }
    public function ejercicios(){
        return $this->hasMany(ejercicio::class);
    }
    public function rutinas(){
        return $this->hasMany(rutina::class);
    }
    public function visitas(){
        return $this->hasMany(visita::class);
    }
    public function categoriaprods(){
        return $this->hasMany(categoriaprod::class);
    }
    public function productos(){
        return $this->hasMany(producto::class);
    }
    public function ventas(){
        return $this->hasMany(venta::class);
    }
    public function movimientos(){
        return $this->hasMany(movimiento::class);
    }
}
