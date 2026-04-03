<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(Request $request)
    {

        if ($request->header('role') !== 'admin') {
            return response()->json(['message' => 'Unauthorized (Only admin can create tasks)'], 403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'in:pending,completed',
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
            'category' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $task = \App\Models\Task::create([
            'title' => 'Temp',
            'status' => 'pending',
            'amount' => $request->amount,
            'type' => $request->type,
            'category' => $request->category,
            'date' => $request->date,
            'description' => $request->description,
        ]);

        return response()->json([
            'message' => 'Record created successfully',
            'task' => $task,
        ], 201);

    }

    public function index(Request $request)
    {
        $query = \App\Models\Task::query();

        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        if ($request->has('date')) {
            $query->whereDate('date', $request->date);
        }

        if ($request->header('role') === 'viewer') 
            {
                // Viewers can only see completed tasks
            }

        $records = $query->latest()->paginate(5);

        return response()->json( ['message' => 'Financial records fetched successfully', 'data' => $records-> items(),
        'pagination' => [
            'total' => $records->total(),
            'per_page' => $records->perPage(),
            'current_page' => $records->currentPage(),
            'last_page' => $records->lastPage(),
            ] 
        ]);
    }

    public function update(Request $request, $id)
    {

            if ($request->header('role') !== 'admin') {
            return response()->json(['message' => 'Admin only'], 403);
        }

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

     if ($request->header('role') !== 'admin') {
            return response()->json(['message' => 'Admin only'], 403);
        }
        
        $task = \App\Models\Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Task deleted successfully']);

    

    }

    public function summary()
    {
        $totalIncome = \App\Models\Task::where('type', 'income')->sum('amount');
        $totalExpense = \App\Models\Task::where('type', 'expense')->sum('amount');

        return response()->json([
            'total_income' => $totalIncome,
            'total_expense' => $totalExpense,
            'net_balance' => $totalIncome - $totalExpense,
        ]);
    }
}
