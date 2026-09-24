<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Enums\Role;


class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['username', 'email', 'password', 'role'];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'role' => Role::class
        ];
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }

    public function isAdmin(): bool
    {
        return $this->role === Role::ADMIN;
    }
}
