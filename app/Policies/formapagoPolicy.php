<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\formapago;
use App\Models\User;

class formapagoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any formapago');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, formapago $formapago): bool
    {
        return $user->checkPermissionTo('view formapago');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create formapago');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, formapago $formapago): bool
    {
        return $user->checkPermissionTo('update formapago');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, formapago $formapago): bool
    {
        return $user->checkPermissionTo('delete formapago');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, formapago $formapago): bool
    {
        return $user->checkPermissionTo('restore formapago');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, formapago $formapago): bool
    {
        return $user->checkPermissionTo('force-delete formapago');
    }
}
