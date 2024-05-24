<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class facturadet extends pivot
{
    use HasFactory;
    public function facturas()
    {
        return $this->belongsTo(factura::class);
    }
    public function impuestos(): BelongsTo{
        return $this->belongsTo(impuesto::class);
    }
}
