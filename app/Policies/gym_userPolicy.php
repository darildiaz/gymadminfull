<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\gym_user;
use App\Models\User;

class gym_userPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any gym_user');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, gym_user $gym_user): bool
    {
        return $user->checkPermissionTo('view gym_user');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create gym_user');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, gym_user $gym_user): bool
    {
        return $user->checkPermissionTo('update gym_user');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, gym_user $gym_user): bool
    {
        return $user->checkPermissionTo('delete gym_user');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, gym_user $gym_user): bool
    {
        return $user->checkPermissionTo('restore gym_user');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, gym_user $gym_user): bool
    {
        return $user->checkPermissionTo('force-delete gym_user');
    }
}
