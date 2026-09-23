<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Task</title>
</head>

<body>
    <h1>Create Task</h1>

    <form method="POST" action="/tasks">
        @csrf

        <div>
            <label for="title">title</label>
            <input type="text" id="title" name="title">

            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">description</label>
            <textarea id="description" name="description"></textarea>

            @error('description')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="priority">priority</label>

            <select name="priority" id="priority">
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
            <input type="date" id="due_date" name="due_date">

            @error('due_date')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="status">status</label>

            <select id="status" name="status">
                <option value="not_started">not started</option>
                <option value="in_progress">in progress</option>
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
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            @error('category_id')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">create task</button>

    </form>

    <a href="/tasks">Back to tasks</a>



</body>

</html>
