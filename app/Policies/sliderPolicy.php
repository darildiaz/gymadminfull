<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\slider;
use App\Models\User;

class sliderPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any slider');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, slider $slider): bool
    {
        return $user->checkPermissionTo('view slider');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create slider');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, slider $slider): bool
    {
        return $user->checkPermissionTo('update slider');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, slider $slider): bool
    {
        return $user->checkPermissionTo('delete slider');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, slider $slider): bool
    {
        return $user->checkPermissionTo('restore slider');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, slider $slider): bool
    {
        return $user->checkPermissionTo('force-delete slider');
    }
}
