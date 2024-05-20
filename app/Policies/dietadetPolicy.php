<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\dietadet;
use App\Models\User;

class dietadetPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any dietadet');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, dietadet $dietadet): bool
    {
        return $user->checkPermissionTo('view dietadet');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create dietadet');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, dietadet $dietadet): bool
    {
        return $user->checkPermissionTo('update dietadet');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, dietadet $dietadet): bool
    {
        return $user->checkPermissionTo('delete dietadet');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, dietadet $dietadet): bool
    {
        return $user->checkPermissionTo('restore dietadet');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, dietadet $dietadet): bool
    {
        return $user->checkPermissionTo('force-delete dietadet');
    }
}
