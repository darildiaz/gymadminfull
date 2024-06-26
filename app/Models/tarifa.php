<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tarifa extends Model
{
    use HasFactory;


    public function gym(){
        return $this->belongsTo(gym::class);
    }
    public function actividads(){
        return $this->belongsTo(actividad::class);
    }
    public function pagoss(){
        return $this->hasMany(pagos::class,'tarifas_id');
    }
    public function impuestos(){
        return $this->belongsTo(impuesto::class);
    }
}
