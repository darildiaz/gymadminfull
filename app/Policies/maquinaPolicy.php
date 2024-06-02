<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\maquina;
use App\Models\User;

class maquinaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any maquina');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, maquina $maquina): bool
    {
        return $user->checkPermissionTo('view maquina');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create maquina');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, maquina $maquina): bool
    {
        return $user->checkPermissionTo('update maquina');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, maquina $maquina): bool
    {
        return $user->checkPermissionTo('delete maquina');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, maquina $maquina): bool
    {
        return $user->checkPermissionTo('restore maquina');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, maquina $maquina): bool
    {
        return $user->checkPermissionTo('force-delete maquina');
    }
}
