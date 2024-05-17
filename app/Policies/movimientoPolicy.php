<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\movimiento;
use App\Models\User;

class movimientoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any movimiento');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, movimiento $movimiento): bool
    {
        return $user->checkPermissionTo('view movimiento');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create movimiento');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, movimiento $movimiento): bool
    {
        return $user->checkPermissionTo('update movimiento');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, movimiento $movimiento): bool
    {
        return $user->checkPermissionTo('delete movimiento');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, movimiento $movimiento): bool
    {
        return $user->checkPermissionTo('restore movimiento');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, movimiento $movimiento): bool
    {
        return $user->checkPermissionTo('force-delete movimiento');
    }
}
