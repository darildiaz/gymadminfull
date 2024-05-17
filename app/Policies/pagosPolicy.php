<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\pagos;
use App\Models\User;

class pagosPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any pagos');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, pagos $pagos): bool
    {
        return $user->checkPermissionTo('view pagos');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create pagos');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, pagos $pagos): bool
    {
        return $user->checkPermissionTo('update pagos');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, pagos $pagos): bool
    {
        return $user->checkPermissionTo('delete pagos');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, pagos $pagos): bool
    {
        return $user->checkPermissionTo('restore pagos');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, pagos $pagos): bool
    {
        return $user->checkPermissionTo('force-delete pagos');
    }
}
