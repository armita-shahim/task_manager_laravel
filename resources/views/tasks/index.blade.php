@extends('layouts.master')
@section('title', 'Tasks')
@section('content')

    <div class="container">
        <h1>Tasks</h1>

        <a class="button" href="/tasks/create">create task</a>
        <a class="button" href="/tasks/deleted">deleted tasks</a>

        @if ($tasks->isEmpty())
            <p>no tasks found</p>
        @else
            @foreach ($tasks as $task)
                <div class="task-card">

                    <h2>{{ $task->title }}</h2>
                    <p>description: {{ $task->description }}</p>
                    <p>priority: {{ $task->priority->value }}</p>
                    <p>status: {{ $task->status->value }}</p>
                    <p>due date: {{ $task->due_date->format('Y-m-d') }}</p>
                    @if ($task->category)
                        <p>category: {{ $task->category->name }}</p>
                    @endif
                    @if (Auth::user()->isAdmin())
                        <p>
                            assigned to:
                            @foreach ($task->users as $user)
                                {{ $user->username }}
                            @endforeach
                        </p>
                    @endif
                    <div class="actions">
                        <a class="button" href="/tasks/{{ $task->id }}/edit">edit</a>
                        <form method="POST" action="/tasks/{{ $task->id }}" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button class="button" type="submit">delete</button>
                        </form>
                        @if (Auth::user()->isAdmin())
                            <a class="button" href="/tasks/{{ $task->id }}/assign-users">assign users</a>
                        @endif
                    </div>
                </div>
            @endforeach

        @endif
        {{ $tasks->links() }}
    </div>
@endsection
