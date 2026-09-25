@extends('layouts.master')
@section('title', 'Assign Users')
@section('content')

    <div class="container">
        <h1>Assign Users</h1>

        <h2>{{ $task->title }}</h2>

        <form method="POST" action="/tasks/{{ $task->id }}/assign-users">
            @csrf
            @method('PUT')

            @foreach ($users as $user)
                <div class="assign-card">
                    <label class="user-checkbox">
                        <input type="checkbox" name="users[]" value="{{ $user->id }}"
                            @if ($task->users->contains($user->id)) checked @endif>
                        {{ $user->username }}</label>
                </div>
            @endforeach

            @error('users')
                <p>{{ $message }}</p>
            @enderror

            @error('users.*')
                <p>{{ $message }}</p>
            @enderror

            <div class="buttons">
                <button class="button" type="submit">save</button>
            </div>
        </form>
        <div class="link">
            <a href="/tasks/{{ $task->id }}/edit">back to task</a>
        </div>

    </div>

@endsection
