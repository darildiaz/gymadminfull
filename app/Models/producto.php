<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;
    public function gym(){
        return $this->belongsTo(gym::class);
    }
    public function categoriaprods()
    {
        return $this->belongsTo(categoriaprod::class,);
    }
    public function movimientos(){
        return $this->hasMany(movimiento::class);
    }
}
