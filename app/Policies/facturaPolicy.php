<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\factura;
use App\Models\User;

class facturaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any factura');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, factura $factura): bool
    {
        return $user->checkPermissionTo('view factura');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create factura');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, factura $factura): bool
    {
        return $user->checkPermissionTo('update factura');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, factura $factura): bool
    {
        return $user->checkPermissionTo('delete factura');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, factura $factura): bool
    {
        return $user->checkPermissionTo('restore factura');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, factura $factura): bool
    {
        return $user->checkPermissionTo('force-delete factura');
    }
}
