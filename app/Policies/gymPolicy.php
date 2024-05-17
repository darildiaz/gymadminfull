<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\gym;
use App\Models\User;

class gymPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any gym');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, gym $gym): bool
    {
        return $user->checkPermissionTo('view gym');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create gym');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, gym $gym): bool
    {
        return $user->checkPermissionTo('update gym');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, gym $gym): bool
    {
        return $user->checkPermissionTo('delete gym');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, gym $gym): bool
    {
        return $user->checkPermissionTo('restore gym');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, gym $gym): bool
    {
        return $user->checkPermissionTo('force-delete gym');
    }
}
