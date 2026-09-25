@extends('layouts.master')
@section('title', 'Create User')
@section('content')

    <div class="container">
        <h1>Create User</h1>

        <form method="POST" action="/users">

            @csrf

            <div>
                <label for="username">username</label>
                <input type="text" id="username" name="username">

                @error('username')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email">email</label>
                <input type="email" id="email" name="email">

                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password">password</label>
                <input type="password" id="password" name="password">

                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation">confirm password</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
            </div>

            <div>
                <label for="role">role</label>

                <select id="role" name="role">
                    <option value="member">member</option>
                    <option value="admin">admin</option>
                </select>

                @error('role')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="buttons">
                <button class="button" type="submit">create user</button>
            </div>

        </form>
        <div class="link">
            <a href="/users">Back to users</a>
        </div>
    </div>
@endsection
