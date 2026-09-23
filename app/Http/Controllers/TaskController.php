<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\Category;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('tasks.create', ['categories' => $categories]);
    }

    public function store(TaskRequest $request)
    {
        Task::create($request->validated());
        return redirect('/tasks');
    }

    // public function show(Task $task)
    // {
    //     return view('tasks.show', ['task' => $task]);
    // }

    public function edit(Task $task)
    {
        $categories = Category::all();
        return view('tasks.edit', ['task' => $task, 'categories' => $categories]);
    }

    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        return redirect("/tasks/{$task->id}");
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/tasks');
    }
}
