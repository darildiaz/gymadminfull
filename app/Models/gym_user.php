<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class gym_user extends Pivot
{
    use HasFactory;
    public function users(): BelongsTo{
        return $this->belongsTo(user::class);
    }
    /*public function rutinas(){
        return $this->belongsTo(rutina::class);
    }*/
    public function gyms()
    {
        return $this->belongsTo(gym::class);
    }
}
