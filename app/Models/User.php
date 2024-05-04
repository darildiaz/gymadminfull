<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Filament\Panel;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;


class User extends Authenticatable implements FilamentUser, HasTenants
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function gyms(): BelongsToMany
    {
        return $this->belongsToMany(gym::class);
    }


    public function getTenants(Panel $panel): Collection
    {
        return $this->Gyms;
    }

    public function canAccessTenant(Model $tenant): bool
    {

       // return $this->gyms()->contains($tenant);
        return $this->gyms()->whereKey($tenant)->exists();
    }

    public function canAccessPanel (Panel $panel): bool
    {
        if ($panel->getId() === 'admin') {
            return $this->isadmin;
        }
        if ($panel->getId() === 'localadmin'){
           //     return
           // return $this->
        }
        return true;
    }
    public function gym(){
        return $this->belongsTo(gym::class);
    }
    public function clientes(){
        return $this->hasMany(cliente::class);
    }
    public function entrenadors(){
        return $this->hasMany(entrenador::class);
    }

}
