<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ejercicio extends Model
{
    use HasFactory;
    public function gym(){
        return $this->belongsTo(gym::class);
    }
    public function tipoejercicios(){
        return $this->belongsTo(tipoejercicio::class);
    }
    public function rutinadets(): HasMany{
        return $this->hasMany(rutinadet::class);
    }
}
