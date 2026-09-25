@extends('layouts.master')
@section('title', 'Edit Profile')
@section('content')

    <div class="container">
        <h1>Edit Profile</h1>

        <form method="POST" action="/profile">

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

            <div class="buttons">
                <button class="button" type="submit">update profile</button>
            </div>

        </form>
        <div class="link">
            <a href="/tasks">back to tasks</a>
        </div>
    </div>
@endsection
