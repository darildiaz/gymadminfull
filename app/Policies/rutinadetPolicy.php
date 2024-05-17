<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\rutinadet;
use App\Models\User;

class rutinadetPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any rutinadet');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, rutinadet $rutinadet): bool
    {
        return $user->checkPermissionTo('view rutinadet');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create rutinadet');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, rutinadet $rutinadet): bool
    {
        return $user->checkPermissionTo('update rutinadet');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, rutinadet $rutinadet): bool
    {
        return $user->checkPermissionTo('delete rutinadet');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, rutinadet $rutinadet): bool
    {
        return $user->checkPermissionTo('restore rutinadet');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, rutinadet $rutinadet): bool
    {
        return $user->checkPermissionTo('force-delete rutinadet');
    }
}
