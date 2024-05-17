<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\rutina;
use App\Models\User;

class rutinaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any rutina');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, rutina $rutina): bool
    {
        return $user->checkPermissionTo('view rutina');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create rutina');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, rutina $rutina): bool
    {
        return $user->checkPermissionTo('update rutina');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, rutina $rutina): bool
    {
        return $user->checkPermissionTo('delete rutina');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, rutina $rutina): bool
    {
        return $user->checkPermissionTo('restore rutina');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, rutina $rutina): bool
    {
        return $user->checkPermissionTo('force-delete rutina');
    }
}
