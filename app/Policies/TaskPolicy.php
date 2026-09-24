<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    public function update(User $user, Task $task): bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        return $user->tasks()->whereKey($task->id)->exists();
    }

    public function delete(User $user, Task $task): bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        return $user->tasks()->whereKey($task->id)->exists();
    }

    public function restore(User $user, Task $task): bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        return $user->tasks()->whereKey($task->id)->exists();
    }

    public function assignUsers(User $user, Task $task): bool
    {
        return $user->isAdmin();
    }
}
