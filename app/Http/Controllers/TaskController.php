<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Tag;
use App\Models\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        $tasks = $request->user()->tasks()->with('category')->get();

        return response()->json([
            'message' => 'Tasks retrieved successfully',
            'tasks' => $tasks,
        ], 200);
    }

    public function store(TaskRequest $request)
    {
        $task = $request->user()->tasks()->create($request->validated());

        if ($request->has('tags')) {
            $task->tags()->sync($request->tags);
        }

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        $this->authorize('view', $task);
        $task->load(['category', 'tags']);

        return response()->json([
            'message' => 'Task retrieved successfully',
            'task' => $task,
        ], 200);
    }

    public function update(TaskRequest $request, Task $task)
    {
        $this->authorize('update', $task);
        $task->update($request->validated());


        if ($request->has('tags')) {
            $task->tags()->sync($request->tags);
        }

        return response()->json([
            'message' => 'Task updated successfully',
            'task' => $task,
        ], 200);
        // return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        $task->delete();

        return response()->json([
            'message' => 'Task deleted successfully.',
        ], 200);
    }

    public function upcoming(Request $request)
    {
        $upcoming = $request->user()->tasks()
            ->where('due_date', '>=', now())
            ->where('due_date', '<=', now()->addDay())
            ->where('status', 'pending')
            ->with('category')
            ->get();

        return response()->json([
            'message' => 'Upcoming tasks retrieved successfully',
            'tasks' => $upcoming,
        ], 200);
    }
}
