@extends('layouts.master')
@section('title', 'Users')
@section('content')

    <div class="container">
        <h1>Users</h1>

        <a class="button" href="/users/create">create user</a>

        @if ($users->isEmpty())
            <p>no users found</p>
        @else
            @foreach ($users as $user)
                <div class="user-card">
                    <h2>{{ $user->username }}</h2>

                    <p>email: {{ $user->email }}</p>
                    <p>role: {{ $user->role->value }}</p>
                    <div class="actions">
                        <a class="button" href="/users/{{ $user->id }}/edit">edit</a>
                        <form method="POST" action="/users/{{ $user->id }}" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button class="button" type="submit">delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
        {{ $users->links() }}

    </div>
@endsection
