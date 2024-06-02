<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\facturadet;
use App\Models\User;

class facturadetPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any facturadet');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, facturadet $facturadet): bool
    {
        return $user->checkPermissionTo('view facturadet');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create facturadet');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, facturadet $facturadet): bool
    {
        return $user->checkPermissionTo('update facturadet');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, facturadet $facturadet): bool
    {
        return $user->checkPermissionTo('delete facturadet');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, facturadet $facturadet): bool
    {
        return $user->checkPermissionTo('restore facturadet');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, facturadet $facturadet): bool
    {
        return $user->checkPermissionTo('force-delete facturadet');
    }
}
