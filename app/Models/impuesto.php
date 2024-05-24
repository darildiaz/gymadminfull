<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class impuesto extends Model
{
    use HasFactory;
    public function facturadets(): HasMany{

        return $this->hasMany(facturadet::class);
    }
    public function tarifas(){
        return $this->hasMany(tarifa::class,'tarifas_id');
    }
}
