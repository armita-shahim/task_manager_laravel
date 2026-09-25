<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use App\Models\User;
use App\Models\Category;
use App\Http\Requests\AssignUsersRequest;

class TaskController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        if ($user->isAdmin()) {
            $tasks = Task::with(['category', 'users'])->orderBy('due_date')->paginate(10);
        } else {
            $tasks = $user->tasks()->with(['category', 'users'])->orderBy('due_date')->paginate(10);
        }

        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('tasks.create', ['categories' => $categories]);
    }

    public function store(TaskRequest $request)
    {
        $task = Task::create($request->validated());
        if (!Auth::user()->isAdmin()) {
            $task->users()->attach(Auth::id());
        }
        return redirect('/tasks')->with('message', 'task created successfully');
    }

    public function edit(Task $task)
    {
        Gate::authorize('update', $task);
        $categories = Category::all();
        return view('tasks.edit', ['task' => $task, 'categories' => $categories]);
    }

    public function update(TaskRequest $request, Task $task)
    {
        Gate::authorize('update', $task);
        $task->update($request->validated());
        return redirect('/tasks')->with('message', 'task updated successfully');
    }

    public function destroy(Task $task)
    {
        Gate::authorize('delete', $task);
        $task->delete();
        return redirect('/tasks')->with('message', 'task deleted successfully');
    }

    public function deletedTasks()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            $tasks = Task::onlyTrashed()->paginate(10);
        } else {
            $tasks = $user->tasks()->onlyTrashed()->paginate(10);
        }

        return view('tasks.deleted', ['tasks' => $tasks]);
    }

    public function restore(int $taskId)
    {
        $task = Task::withTrashed()->findOrFail($taskId);

        Gate::authorize('restore', $task);

        $task->restore();

        return redirect('/tasks')->with('message', 'task restored successfully');
    }

    public function assignShow(Task $task)
    {
        Gate::authorize('assignUsers', $task);

        $users = User::all();
        return view('tasks.assign-users', ['task' => $task, 'users' => $users]);
    }

    public function assignUsers(AssignUsersRequest $request, Task $task)
    {
        Gate::authorize('assignUsers', $task);
        $validated = $request->validated();
        $userIds = $validated['users'] ?? [];

        DB::beginTransaction();
        try {
            $task->users()->sync($userIds);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return redirect('/tasks')->with('message', 'users assigned to task successfully');
    }
}
