<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entrenador extends Model
{
    use HasFactory;
    public function gym(){
        return $this->belongsTo(gym::class);
    }
    public function users(){
        return $this->belongsTo(user::class);
    }
    public function actividadentrenador(){
        return $this->hasMany(actividadentrenador::class,'entrenadors_id');
    }
    
    public function rutinadets(){
        return $this->hasMany(rutinadet::class);
    }

}
