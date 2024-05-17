<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\actividadentrenador;
use App\Models\User;

class actividadentrenadorPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any actividadentrenador');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, actividadentrenador $actividadentrenador): bool
    {
        return $user->checkPermissionTo('view actividadentrenador');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create actividadentrenador');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, actividadentrenador $actividadentrenador): bool
    {
        return $user->checkPermissionTo('update actividadentrenador');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, actividadentrenador $actividadentrenador): bool
    {
        return $user->checkPermissionTo('delete actividadentrenador');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, actividadentrenador $actividadentrenador): bool
    {
        return $user->checkPermissionTo('restore actividadentrenador');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, actividadentrenador $actividadentrenador): bool
    {
        return $user->checkPermissionTo('force-delete actividadentrenador');
    }
}
