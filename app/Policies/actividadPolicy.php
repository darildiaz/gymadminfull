<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\actividad;
use App\Models\User;

class actividadPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any actividad');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, actividad $actividad): bool
    {
        return $user->checkPermissionTo('view actividad');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create actividad');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, actividad $actividad): bool
    {
        return $user->checkPermissionTo('update actividad');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, actividad $actividad): bool
    {
        return $user->checkPermissionTo('delete actividad');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, actividad $actividad): bool
    {
        return $user->checkPermissionTo('restore actividad');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, actividad $actividad): bool
    {
        return $user->checkPermissionTo('force-delete actividad');
    }
}
