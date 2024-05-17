<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\cliente;
use App\Models\User;

class clientePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any cliente');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, cliente $cliente): bool
    {
        return $user->checkPermissionTo('view cliente');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create cliente');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, cliente $cliente): bool
    {
        return $user->checkPermissionTo('update cliente');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, cliente $cliente): bool
    {
        return $user->checkPermissionTo('delete cliente');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, cliente $cliente): bool
    {
        return $user->checkPermissionTo('restore cliente');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, cliente $cliente): bool
    {
        return $user->checkPermissionTo('force-delete cliente');
    }
}
