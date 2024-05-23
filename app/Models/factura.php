<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class factura extends Model
{
    use HasFactory;
    public function gym(){
        return $this->belongsTo(gym::class);
    }
    public function datosfacturas()
    {
        return $this->belongsTo(datosfactura::class);
    }
    public function facturadets(): HasMany{

        return $this->hasMany(facturadet::class,'facturas_id');
    }
}
