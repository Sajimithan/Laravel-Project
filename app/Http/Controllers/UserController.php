<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Retrieve all users
    public function index()
    {
        $users = User::all(); // Fetch all users
        return response()->json($users, 200);
    }

    // Create a new user
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'age' => 'required|integer|min:0',
            'gender' => 'required|string|in:male,female,other',
            'health_conditions' => 'nullable|string',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Encrypt the password
            'age' => $request->age,
            'gender' => $request->gender,
            'health_conditions' => $request->health_conditions,
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user,
        ], 201);
    }

    // Update an existing user
    public function update(Request $request, $id)
    {
        // Find the user or fail
        $user = User::findOrFail($id);

        // Validate the request data
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . $user->id,
            'age' => 'sometimes|required|integer|min:0',
            'gender' => 'sometimes|required|string|in:male,female,other',
            'health_conditions' => 'nullable|string',
        ]);

        // Update user data
        $user->update($request->all());

        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user,
        ]);
    }

    // Delete a user
    public function destroy($id)
    {
        // Find the user or fail
        $user = User::findOrFail($id);

        // Delete the user
        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully',
        ]);
    }
}
