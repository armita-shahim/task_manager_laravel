<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use App\Enums\Role;

class TaskPolicy
{
    public function update(User $user, Task $task): bool
    {
        if ($user->role === Role::ADMIN) {
            return true;
        }

        return $user->tasks()->whereKey($task->id)->exists();
    }

    public function delete(User $user, Task $task): bool
    {
        if ($user->role === Role::ADMIN) {
            return true;
        }

        return $user->tasks()->whereKey($task->id)->exists();
    }

    public function restore(User $user, Task $task): bool
    {
        if ($user->role === Role::ADMIN) {
            return true;
        }

        return $user->tasks()->whereKey($task->id)->exists();
    }
}
