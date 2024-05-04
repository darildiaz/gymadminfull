<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    use HasFactory;
    public function gym(){
        return $this->belongsTo(gym::class);
    }
    public function suscripcions(){
        return $this->hasMany(suscripcion::class);
    }
    public function users(){
        return $this->belongsTo(user::class);
    }
}
