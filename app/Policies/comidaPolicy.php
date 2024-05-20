<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\comida;
use App\Models\User;

class comidaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any comida');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, comida $comida): bool
    {
        return $user->checkPermissionTo('view comida');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create comida');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, comida $comida): bool
    {
        return $user->checkPermissionTo('update comida');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, comida $comida): bool
    {
        return $user->checkPermissionTo('delete comida');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, comida $comida): bool
    {
        return $user->checkPermissionTo('restore comida');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, comida $comida): bool
    {
        return $user->checkPermissionTo('force-delete comida');
    }
}
