<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\suscripcion;
use App\Models\User;

class suscripcionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any suscripcion');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, suscripcion $suscripcion): bool
    {
        return $user->checkPermissionTo('view suscripcion');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create suscripcion');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, suscripcion $suscripcion): bool
    {
        return $user->checkPermissionTo('update suscripcion');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, suscripcion $suscripcion): bool
    {
        return $user->checkPermissionTo('delete suscripcion');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, suscripcion $suscripcion): bool
    {
        return $user->checkPermissionTo('restore suscripcion');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, suscripcion $suscripcion): bool
    {
        return $user->checkPermissionTo('force-delete suscripcion');
    }
}
