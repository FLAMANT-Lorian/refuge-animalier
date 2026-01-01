<?php

namespace App\Policies;

use App\Models\AdoptionRequest;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AdoptionRequestPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isVolunteer();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AdoptionRequestPolicy $adoptionRequest): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isVolunteer();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return $user->isAdmin() || $user->isVolunteer();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AdoptionRequestPolicy $adoptionRequest): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AdoptionRequestPolicy $adoptionRequest): bool
    {
        return false;
    }
}
