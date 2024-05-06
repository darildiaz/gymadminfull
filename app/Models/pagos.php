<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pagos extends Model
{
    use HasFactory;
    public function actividads(){
        return $this->belongsTo(actividad::class);
    }
    public function gym(){
        return $this->belongsTo(gym::class);
    }
    public function clientes(){
        return $this->belongsTo(cliente::class);
    }
}