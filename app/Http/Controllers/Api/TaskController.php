<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json([
            'message' => 'Task created successfully',
            'task' => $task,
        ], 201);
    }

    public function index()
    {
        $tasks = \App\Models\Task::latest()->paginate(5);
        return response()->json( ['message' => 'Tasks fetched successfully', 'data' => $tasks-> items(),
        'pagination' => [
            'total' => $tasks->total(),
            'per_page' => $tasks->perPage(),
            'current_page' => $tasks->currentPage(),
            'last_page' => $tasks->lastPage(),
            ] 
        ]);
    }

    public function update(Request $request, $id)
    {
        $task = \App\Models\Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'in:pending,completed'
        ]);

        $task->update($request->all());

        return response()->json([
            'message' => 'Task updated successfully',
            'data' => $task,
        ]);

    }

    public function destroy($id)
    {
        $task = \App\Models\Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Task deleted successfully']);
    }
}
