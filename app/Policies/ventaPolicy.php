<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\venta;
use App\Models\User;

class ventaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any venta');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, venta $venta): bool
    {
        return $user->checkPermissionTo('view venta');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create venta');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, venta $venta): bool
    {
        return $user->checkPermissionTo('update venta');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, venta $venta): bool
    {
        return $user->checkPermissionTo('delete venta');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, venta $venta): bool
    {
        return $user->checkPermissionTo('restore venta');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, venta $venta): bool
    {
        return $user->checkPermissionTo('force-delete venta');
    }
}
