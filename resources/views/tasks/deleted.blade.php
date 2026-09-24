<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleted Tasks</title>
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

        .button {
            display: inline-block;
            padding: 8px 20px;
            margin: 5px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            font-family: Arial, sans-serif;
            font-size: 16px;
        }

        .button:hover {
            background: #1d4ed8;
        }

        .actions {
            margin-top: 15px;
            text-align: center;
        }

        .link {
            text-align: center;
            margin-top: 15px;
        }

        a {
            color: #60a5fa;
        }
    </style>
</head>

<body>
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
</body>

</html>
