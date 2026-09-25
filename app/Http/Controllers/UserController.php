<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny', User::class);

        $users = User::paginate(10);

        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        Gate::authorize('create', User::class);

        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
        Gate::authorize('create', User::class);

        User::create($request->validated());

        return redirect('/users')->with('message', 'user created successfully');
    }

    public function edit(User $user)
    {
        Gate::authorize('update', $user);

        return view('users.edit', ['user' => $user]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        Gate::authorize('update', $user);

        $user->update($request->validated());

        return redirect('/users')->with('message', 'user updated successfully');
    }

    public function destroy(User $user)
    {
        Gate::authorize('delete', $user);

        $user->tasks()->detach();
        $user->delete();

        return redirect('/users')->with('message', 'user deleted successfully');
    }
}
