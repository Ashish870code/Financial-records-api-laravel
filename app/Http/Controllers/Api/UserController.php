<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserCustom;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users_table_custom,email',
            'role' => 'required|string|max:50',
            'is_active' => 'required|boolean',
        ]);

        $user = UserCustom::create($request->all());

        return response()->json(['message' => 'User created successfully', 'data' => $user], 201);
    }

    public function index()
    {
        return response()->json(['data' => UserCustom::all()]);
    }

    public function update(Request $request, $id)
    {
        $user = UserCustom::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        
        $user->update($request->all());

        return response()->json(['message' => 'User updated successfully', 'data' => $user]);
    }
}
