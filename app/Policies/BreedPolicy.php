<?php

namespace App\Policies;

use App\Models\Breed;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BreedPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }
}
