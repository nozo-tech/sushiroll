<?php

namespace App\Policies;

use App\Models\Roll;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RollPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Roll $roll): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Roll $roll): bool
    {
        return $roll->user->id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Roll $roll): bool
    {
        return $roll->user->id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Roll $roll): bool
    {
        return ! $roll->taken_down && $roll->user->id === $user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Roll $roll): bool
    {
        return false;
    }
}
