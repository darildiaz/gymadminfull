<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\datosfactura;
use App\Models\User;

class datosfacturaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any datosfactura');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, datosfactura $datosfactura): bool
    {
        return $user->checkPermissionTo('view datosfactura');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create datosfactura');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, datosfactura $datosfactura): bool
    {
        return $user->checkPermissionTo('update datosfactura');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, datosfactura $datosfactura): bool
    {
        return $user->checkPermissionTo('delete datosfactura');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, datosfactura $datosfactura): bool
    {
        return $user->checkPermissionTo('restore datosfactura');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, datosfactura $datosfactura): bool
    {
        return $user->checkPermissionTo('force-delete datosfactura');
    }
}
