<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
</head>

<body>

    <h1>Edit Task</h1>

    <form method="POST" action="/tasks/{{ $task->id }}">
        @csrf
        @method('PUT')

        <div>
            <label for="title">title</label>

            <input type="text" id="title" name="title" value="{{ $task->title }}">

            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">description</label>

            <textarea id="description" name="description">{{ $task->description }}</textarea>

            @error('description')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="priority">priority</label>

            <select id="priority" name="priority">
                <option value="low">low</option>
                <option value="normal">normal</option>
                <option value="high">high</option>
            </select>

            @error('priority')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="due_date">due date</label>

            <input type="date" id="due_date" name="due_date" value="{{ $task->due_date->format('Y-m-d') }}">

            @error('due_date')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="status">status</label>

            <select id="status" name="status">
                <option value="not_started">not started
                </option>
                <option value="in_progress">in progress
                </option>
                <option value="done">done</option>
            </select>

            @error('status')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="category_id">category</label>

            <select id="category_id" name="category_id">

                {{-- <option value="">no category</option> --}}

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $task->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach

            </select>

            @error('category_id')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">update task</button>

    </form>

    <a href="/tasks">Back to tasks</a>

</body>

</html>
