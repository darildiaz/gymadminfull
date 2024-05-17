<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\categoriaprod;
use App\Models\User;

class categoriaprodPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any categoriaprod');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, categoriaprod $categoriaprod): bool
    {
        return $user->checkPermissionTo('view categoriaprod');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create categoriaprod');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, categoriaprod $categoriaprod): bool
    {
        return $user->checkPermissionTo('update categoriaprod');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, categoriaprod $categoriaprod): bool
    {
        return $user->checkPermissionTo('delete categoriaprod');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, categoriaprod $categoriaprod): bool
    {
        return $user->checkPermissionTo('restore categoriaprod');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, categoriaprod $categoriaprod): bool
    {
        return $user->checkPermissionTo('force-delete categoriaprod');
    }
}
