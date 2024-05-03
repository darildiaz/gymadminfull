<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class gym extends Model
{
    use HasFactory;
    public function members(){
        return $this->belongsToMany(User::class,'gym_user','gym_id','user_id');
    }

    public function categorias()
    {
        return $this->belongsTo(categoria::class,'categorias_id');
    }
    public function users(){
        return $this->hasMany(user::class);
    }
    public function actividades(){
        return $this->hasMany(actividad::class);
    }
    public function gym_user(): HasMany{

        return $this->hasMany(gym_user::class);
    }

}
