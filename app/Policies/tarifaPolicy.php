<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\tarifa;
use App\Models\User;

class tarifaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any tarifa');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, tarifa $tarifa): bool
    {
        return $user->checkPermissionTo('view tarifa');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create tarifa');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, tarifa $tarifa): bool
    {
        return $user->checkPermissionTo('update tarifa');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, tarifa $tarifa): bool
    {
        return $user->checkPermissionTo('delete tarifa');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, tarifa $tarifa): bool
    {
        return $user->checkPermissionTo('restore tarifa');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, tarifa $tarifa): bool
    {
        return $user->checkPermissionTo('force-delete tarifa');
    }
}
