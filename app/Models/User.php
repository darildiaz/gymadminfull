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
use Althinect\FilamentSpatieRolesPermissions\Concerns\HasSuperAdmin;

class User extends Authenticatable implements FilamentUser, HasTenants
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasSuperAdmin;
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
        return $this->gyms()->whereKey($tenant)->where('habilitado',true)->exists();
    }

    public function canAccessPanel (Panel $panel): bool
    {
        if ($panel->getId() === 'admin') {
            return $this->isadmin;
        }
        if ($panel->getId() === 'localadmin'){
            if (auth()->user()->clientes()->exists()) {
              //  return false;
            }
    
            return true;
        }
        if ($panel->getId() === 'clientesadmin'){
            if (auth()->user()->clientes()->exists()) {
                return true;
            }
    
            return false;
         }
        return true;
    }
    public function gym(){
        return $this->belongsTo(gym::class);
    }
    public function clientes(){
        return $this->hasMany(cliente::class,'users_id');
    }
    public function entrenadors(){
        return $this->hasMany(entrenador::class);
    }
    public function gym_users(){
        return $this->hasMany(gym_user::class,'user_id');
    }
    public function getcliente()
    {
        $user = auth()->user();

        if ($user && $user->cliente) {
            return $user->cliente->id;
        }

        return null; // o puedes lanzar una excepción si prefieres
    }
}
