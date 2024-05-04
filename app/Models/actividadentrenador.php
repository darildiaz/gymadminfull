<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class actividadentrenador extends pivot
{
    use HasFactory;
    public function entrenadors(): BelongsTo{
        return $this->belongsTo(entrenador::class);
    }
    /*public function rutinas(){
        return $this->belongsTo(rutina::class);
    }*/
    public function actividads()
    {
        return $this->belongsTo(actividad::class);
    }

}
