<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class movimiento extends Model
{
    use HasFactory;
    public function gym(){
        return $this->belongsTo(gym::class);
    }
    public function formapagos()
    {
        return $this->belongsTo(formapago::class,);
    }
    public function ventas()
    {
        return $this->belongsTo(venta::class,);
    }
    public function pagoss()
    {
        return $this->belongsTo(pagos::class,);
    }
}
