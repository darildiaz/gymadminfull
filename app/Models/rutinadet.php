<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rutinadet extends Pivot
{
    use HasFactory;
    public function ejercicios(): BelongsTo{
        return $this->belongsTo(ejercicio::class);
    }
    /*public function rutinas(){
        return $this->belongsTo(rutina::class);
    }*/
    public function rutina(): BelongsTo
    {
        return $this->belongsTo(rutina::class);
    }
}
