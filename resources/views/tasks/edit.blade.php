@extends('layouts.master')
@section('title', 'Edit Task')
@section('content')

    <div class="container">
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
                    <option value="low" @if ($task->priority === \App\Enums\Priority::LOW) selected @endif>
                        low
                    </option>

                    <option value="normal" @if ($task->priority === \App\Enums\Priority::NORMAL) selected @endif>
                        normal
                    </option>

                    <option value="high" @if ($task->priority === \App\Enums\Priority::HIGH) selected @endif>
                        high
                    </option>
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
                    <option value="not_started" @if ($task->status === \App\Enums\Status::NOT_STARTED) selected @endif>
                        not started
                    </option>

                    <option value="in_progress" @if ($task->status === \App\Enums\Status::IN_PROGRESS) selected @endif>
                        in progress
                    </option>

                    <option value="done" @if ($task->status === \App\Enums\Status::DONE) selected @endif>
                        done
                    </option>
                </select>

                @error('status')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="category_id">category</label>

                <select id="category_id" name="category_id">

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($task->category_id === $category->id) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach

                </select>

                @error('category_id')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="buttons">
                <button class="button" type="submit">update task</button>
            </div>

        </form>
        <div class="link">
            <a href="/tasks">Back to tasks</a>
        </div>

    </div>
@endsection
