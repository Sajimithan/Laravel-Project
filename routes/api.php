<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Default user retrieval route (protected)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Login Route for obtaining Sanctum token
Route::post('/login', function (Request $request) {
    // Validate the incoming request data
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // Find the user by email
    $user = User::where('email', $request->email)->first();

    // Check if user exists and password matches
    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    // Generate a token using Sanctum
    $token = $user->createToken('MyAppToken')->plainTextToken;

    return response()->json(['token' => $token]);
});

// CRUD routes for users (protected)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [UserController::class, 'index']); // Retrieve all users
    Route::post('/users', [UserController::class, 'store']); // Create a new user
    Route::put('/users/{id}', [UserController::class, 'update']); // Update an existing user
    Route::delete('/users/{id}', [UserController::class, 'destroy']); // Delete a user
});

// Routes protected by role middleware
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return response()->json(['message' => 'Welcome to the Admin Dashboard']);
    });
});

Route::middleware(['auth:sanctum', 'role:user'])->group(function () {
    Route::get('/dashboard', function () {
        return response()->json(['message' => 'Welcome to the User Dashboard']);
    });
});
