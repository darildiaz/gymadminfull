<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\categoria;
use App\Models\User;

class categoriaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any categoria');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, categoria $categoria): bool
    {
        return $user->checkPermissionTo('view categoria');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create categoria');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, categoria $categoria): bool
    {
        return $user->checkPermissionTo('update categoria');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, categoria $categoria): bool
    {
        return $user->checkPermissionTo('delete categoria');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, categoria $categoria): bool
    {
        return $user->checkPermissionTo('restore categoria');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, categoria $categoria): bool
    {
        return $user->checkPermissionTo('force-delete categoria');
    }
}
