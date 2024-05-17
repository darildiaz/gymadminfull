<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\visita;
use App\Models\User;

class visitaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any visita');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, visita $visita): bool
    {
        return $user->checkPermissionTo('view visita');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create visita');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, visita $visita): bool
    {
        return $user->checkPermissionTo('update visita');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, visita $visita): bool
    {
        return $user->checkPermissionTo('delete visita');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, visita $visita): bool
    {
        return $user->checkPermissionTo('restore visita');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, visita $visita): bool
    {
        return $user->checkPermissionTo('force-delete visita');
    }
}
