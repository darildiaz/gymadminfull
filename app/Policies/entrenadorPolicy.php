<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\entrenador;
use App\Models\User;

class entrenadorPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any entrenador');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, entrenador $entrenador): bool
    {
        return $user->checkPermissionTo('view entrenador');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create entrenador');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, entrenador $entrenador): bool
    {
        return $user->checkPermissionTo('update entrenador');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, entrenador $entrenador): bool
    {
        return $user->checkPermissionTo('delete entrenador');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, entrenador $entrenador): bool
    {
        return $user->checkPermissionTo('restore entrenador');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, entrenador $entrenador): bool
    {
        return $user->checkPermissionTo('force-delete entrenador');
    }
}
