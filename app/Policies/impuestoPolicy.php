<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\impuesto;
use App\Models\User;

class impuestoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any impuesto');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, impuesto $impuesto): bool
    {
        return $user->checkPermissionTo('view impuesto');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create impuesto');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, impuesto $impuesto): bool
    {
        return $user->checkPermissionTo('update impuesto');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, impuesto $impuesto): bool
    {
        return $user->checkPermissionTo('delete impuesto');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, impuesto $impuesto): bool
    {
        return $user->checkPermissionTo('restore impuesto');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, impuesto $impuesto): bool
    {
        return $user->checkPermissionTo('force-delete impuesto');
    }
}
