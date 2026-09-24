<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasks</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #0f172a;
            color: white;
        }

        .container {
            width: 650px;
            margin: 60px auto;
            padding: 25px;
            background: #1e293b;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
        }

        .button {
            display: inline-block;
            padding: 8px 20px;
            margin-bottom: 20px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            font-family: Arial, sans-serif;
            font-size: 16px;
        }

        .button:hover {
            background: #1d4ed8;
        }

        .task-card {
            padding: 15px;
            margin-bottom: 15px;
            background: #0f172a;
            border-radius: 8px;
            overflow-wrap: break-word;
        }

        .task-card h2 {
            margin-top: 0;
        }

        .task-card a {
            color: #60a5fa;
        }

        .actions {
            margin-top: 15px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Tasks</h1>
        @if (session()->has('message'))
            <p>{{ session('message') }}</p>
        @endif

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
                    <div class="actions">
                        <a class="button" href="/tasks/{{ $task->id }}/edit">edit</a>
                        <form method="POST" action="/tasks/{{ $task->id }}" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button class="button" type="submit">delete</button>
                        </form>
                    </div>
                </div>
            @endforeach

        @endif
    </div>

</body>

</html>
