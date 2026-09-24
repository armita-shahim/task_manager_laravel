<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use App\Enums\Role;

class CategoryPolicy
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

    public function update(User $user, Category $category): bool
    {
        if ($user->role === Role::ADMIN) {
            return true;
        }

        return false;
    }

    public function delete(User $user, Category $category): bool
    {
        if ($user->role === Role::ADMIN) {
            return true;
        }

        return false;
    }
}
