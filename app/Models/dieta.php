<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class dieta extends Model
{
    use HasFactory;
    public function gym(){
        return $this->belongsTo(gym::class);
    }
    public function clientes(){
        return $this->belongsTo(cliente::class);
    }
    public function entrenadors(){
        return $this->belongsTo(entrenador::class);
    }
    public function dietadets(): HasMany{

        return $this->hasMany(dietadet::class,'dietas_id');
    }
}
