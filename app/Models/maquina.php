<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class maquina extends Model
{
    use HasFactory;
    public function gym(){
        return $this->belongsTo(gym::class);
    }
    public function ejercicio(){
        return $this->hasMany(ejercicio::class);
    }
}
