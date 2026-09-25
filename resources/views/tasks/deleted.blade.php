@extends('layouts.master')
@section('title', 'Deleted Tasks')
@section('content')

    <div class="container">
        <h1>Deleted Tasks</h1>

        @if ($tasks->isEmpty())
            <p>no deleted tasks found</p>
        @else
            @foreach ($tasks as $task)
                <div class="task-card">
                    <h2>{{ $task->title }}</h2>

                    <p>description: {{ $task->description }}</p>
                    <p>priority: {{ $task->priority->value }}</p>
                    <p>status: {{ $task->status->value }}</p>
                    <p>due date: {{ $task->due_date->format('Y-m-d') }}</p>

                    <div class="actions">
                        <form method="POST" action="/tasks/{{ $task->id }}/restore">
                            @csrf
                            @method('PUT')

                            <button class="button" type="submit">restore</button>
                        </form>

                    </div>

                </div>
            @endforeach
        @endif
        <div class="link">
            <a href="/tasks">back to tasks</a>
        </div>
    </div>
@endsection
