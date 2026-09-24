<?php

namespace App\Policies;

use App\Models\User;
use App\Enums\Role;

class UserPolicy
{
    public function viewAny(User $user): bool
    {
        if ($user->role === Role::ADMIN) {
            return true;
        }
        return false;
    }

    public function create(User $user): bool
    {
        if ($user->role === Role::ADMIN) {
            return true;
        }
        return false;
    }

    public function update(User $user, User $model): bool
    {
        if ($user->role === Role::ADMIN) {
            return true;
        }
        return false;
    }

    public function delete(User $user, User $model): bool
    {
        if ($user->role === Role::ADMIN) {
            return true;
        }
        return false;
    }
}
