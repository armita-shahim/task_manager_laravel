@extends('layouts.master')
@section('title', 'Edit User')
@section('content')

    <div class="container">
        <h1>Edit User</h1>

        <form method="POST" action="/users/{{ $user->id }}">

            @csrf
            @method('PUT')

            <div>
                <label for="username">username</label>
                <input type="text" id="username" name="username" value="{{ $user->username }}">

                @error('username')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email">email</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}">

                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="role">role</label>

                <select id="role" name="role">

                    <option value="member" @if ($user->role === \App\Enums\Role::MEMBER) selected @endif>
                        member
                    </option>

                    <option value="admin" @if ($user->role === \App\Enums\Role::ADMIN) selected @endif>
                        admin
                    </option>

                </select>

                @error('role')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="buttons">
                <button class="button" type="submit">update user</button>
            </div>

        </form>
        <div class="link">
            <a href="/users">Back to users</a>
        </div>
    </div>
@endsection
