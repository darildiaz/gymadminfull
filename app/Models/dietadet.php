<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
class dietadet extends Pivot
{
    use HasFactory;
    public function comidas(): BelongsTo{
        return $this->belongsTo(comida::class);
    }
    public function ventas(){
        return $this->belongsTo(venta::class);
    }
}
