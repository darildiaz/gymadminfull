<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class venta extends Model
{
    use HasFactory;
    public function gym(){
        return $this->belongsTo(gym::class);
    }
    public function ventadets(): HasMany{

        return $this->hasMany(ventadet::class);
    }
    public function clientes(){
        return $this->belongsTo(cliente::class);
    }
    public function movimientos(): HasMany{

        return $this->hasMany(movimiento::class);
    }
}
