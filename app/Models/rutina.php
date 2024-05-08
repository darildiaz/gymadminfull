<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class rutina extends Model
{
    use HasFactory;
    public function gym(){
        return $this->belongsTo(gym::class);
    }
    public function rutinadets(): HasMany{

        return $this->hasMany(rutinadet::class);
    }
    public function actividads(){
        return $this->belongsTo(actividad::class);
    }
    public function clientes(){
        return $this->belongsTo(cliente::class);
    }
    public function entrenadors(){
        return $this->belongsTo(entrenador::class);
    }
}
