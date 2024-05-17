<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\ejercicio;
use App\Models\User;

class ejercicioPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any ejercicio');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ejercicio $ejercicio): bool
    {
        return $user->checkPermissionTo('view ejercicio');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create ejercicio');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ejercicio $ejercicio): bool
    {
        return $user->checkPermissionTo('update ejercicio');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ejercicio $ejercicio): bool
    {
        return $user->checkPermissionTo('delete ejercicio');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ejercicio $ejercicio): bool
    {
        return $user->checkPermissionTo('restore ejercicio');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ejercicio $ejercicio): bool
    {
        return $user->checkPermissionTo('force-delete ejercicio');
    }
}
