<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasks</title>
</head>

<body>
    <h1>Tasks</h1>

    <a href="/tasks/create">create task</a>

    @if ($tasks->isEmpty())
        <p>no tasks found</p>
    @else
        @foreach ($tasks as $task)
            <div class="task_card">

                <h2>{{ $task->title }}</h2>
                <p>description: {{ $task->description }}</p>
                <p>priority: {{ $task->priority->value }}</p>
                <p>status: {{ $task->status->value }}</p>
                <p>due date: {{ $task->due_date->format('Y-m-d') }}</p>
                @if ($task->category)
                    <p>category: {{ $task->category->name }}</p>
                @endif

                <a href="/tasks/{{ $task->id }}/edit">edit</a>
                <form method="POST" action="/tasks/{{ $task->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">delete</button>
                </form>

            </div>
        @endforeach

    @endif

</body>

</html>
