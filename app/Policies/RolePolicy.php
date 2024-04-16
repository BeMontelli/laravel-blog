<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class RolePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function accessAdmin(User $user): bool
    {
        return $user->role === "admin";
    }
}
