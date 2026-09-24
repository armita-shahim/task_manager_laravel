<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Users</title>
</head>

<body>

    <h1>Assign Users</h1>

    <h2>{{ $task->title }}</h2>

    <form method="POST" action="/tasks/{{ $task->id }}/assign-users">
        @csrf
        @method('PUT')

        @foreach ($users as $user)
            <div>
                <input type="checkbox" name="users[]" value="{{ $user->id }}"
                @if ($task->users->contains($user->id))
                    checked
                @endif>
                <label>{{ $user->username }}</label>
            </div>
        @endforeach

        @error('users')
            <p>{{ $message }}</p>
        @enderror

        @error('users.*')
            <p>{{ $message }}</p>
        @enderror

        <button type="submit">save</button>
    </form>

    <a href="/tasks/{{ $task->id }}/edit">back to task</a>

</body>

</html>
