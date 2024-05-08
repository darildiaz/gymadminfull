<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoejercicio extends Model
{
    use HasFactory;


    public function ejercicios(){
        return $this->hasMany(ejercicio::class);
    }
}
