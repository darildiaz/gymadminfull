<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\tipoejercicio;
use App\Models\User;

class tipoejercicioPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any tipoejercicio');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, tipoejercicio $tipoejercicio): bool
    {
        return $user->checkPermissionTo('view tipoejercicio');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create tipoejercicio');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, tipoejercicio $tipoejercicio): bool
    {
        return $user->checkPermissionTo('update tipoejercicio');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, tipoejercicio $tipoejercicio): bool
    {
        return $user->checkPermissionTo('delete tipoejercicio');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, tipoejercicio $tipoejercicio): bool
    {
        return $user->checkPermissionTo('restore tipoejercicio');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, tipoejercicio $tipoejercicio): bool
    {
        return $user->checkPermissionTo('force-delete tipoejercicio');
    }
}
