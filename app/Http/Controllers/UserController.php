<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of users
     */
    public function index()
    {
        // Only admins can see all users
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $users = User::paginate(15);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user
     */
    public function create()
    {
        // Only admins can create users
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        return view('users.create');
    }

    /**
     * Store a newly created user
     */
    public function store(Request $request)
    {
        // Only admins can create users
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,doctor,nurse,patient',
            'age' => 'nullable|integer|min:0|max:150',
            'gender' => 'nullable|string|in:male,female,other',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'emergency_contact' => 'nullable|string|max:100',
            'blood_type' => 'nullable|string|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'allergies' => 'nullable|string|max:500',
            'medications' => 'nullable|string|max:500',
            'height' => 'nullable|numeric|min:50|max:300', // cm
            'weight' => 'nullable|numeric|min:10|max:500', // kg
            'last_checkup_date' => 'nullable|date',
            'insurance_provider' => 'nullable|string|max:100',
            'insurance_number' => 'nullable|string|max:100',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'age' => $request->age,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'emergency_contact' => $request->emergency_contact,
            'blood_type' => $request->blood_type,
            'allergies' => $request->allergies,
            'medications' => $request->medications,
            'height' => $request->height,
            'weight' => $request->weight,
            'last_checkup_date' => $request->last_checkup_date,
            'insurance_provider' => $request->insurance_provider,
            'insurance_number' => $request->insurance_number,
        ]);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified user
     */
    public function show(User $user)
    {
        // Users can only see their own profile, admins can see all
        if (!Auth::user()->isAdmin() && Auth::id() !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user
     */
    public function edit(User $user)
    {
        // Users can only edit their own profile, admins can edit all
        if (!Auth::user()->isAdmin() && Auth::id() !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user
     */
    public function update(Request $request, User $user)
    {
        // Users can only update their own profile, admins can update all
        if (!Auth::user()->isAdmin() && Auth::id() !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => Auth::user()->isAdmin() ? 'required|string|in:admin,doctor,nurse,patient' : 'prohibited',
            'age' => 'nullable|integer|min:0|max:150',
            'gender' => 'nullable|string|in:male,female,other',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'emergency_contact' => 'nullable|string|max:100',
            'blood_type' => 'nullable|string|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'allergies' => 'nullable|string|max:500',
            'medications' => 'nullable|string|max:500',
            'height' => 'nullable|numeric|min:50|max:300',
            'weight' => 'nullable|numeric|min:10|max:500',
            'last_checkup_date' => 'nullable|date',
            'insurance_provider' => 'nullable|string|max:100',
            'insurance_number' => 'nullable|string|max:100',
        ]);

        // Update user data
        $user->update($request->all());

        return redirect()->route('users.show', $user)
            ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user
     */
    public function destroy(User $user)
    {
        // Only admins can delete users
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        // Prevent admin from deleting themselves
        if (Auth::id() === $user->id) {
            return redirect()->route('users.index')
                ->with('error', 'You cannot delete your own account.');
        }

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully.');
    }

    /**
     * Show user's health dashboard
     */
    public function healthDashboard()
    {
        $user = Auth::user();
        return view('users.health-dashboard', compact('user'));
    }

    /**
     * Update user's health information
     */
    public function updateHealth(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'age' => 'nullable|integer|min:0|max:150',
            'gender' => 'nullable|string|in:male,female,other',
            'blood_type' => 'nullable|string|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'allergies' => 'nullable|string|max:500',
            'medications' => 'nullable|string|max:500',
            'height' => 'nullable|numeric|min:50|max:300',
            'weight' => 'nullable|numeric|min:10|max:500',
            'last_checkup_date' => 'nullable|date',
        ]);

        $user->update($request->all());

        return redirect()->route('users.health-dashboard')
            ->with('success', 'Health information updated successfully.');
    }

    /**
     * Get users by role (API endpoint)
     */
    public function getByRole($role)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $users = User::where('role', $role)->get();
        return response()->json($users);
    }

    /**
     * Get user statistics (API endpoint)
     */
    public function getStats()
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $stats = [
            'total_users' => User::count(),
            'patients' => User::where('role', 'patient')->count(),
            'doctors' => User::where('role', 'doctor')->count(),
            'nurses' => User::where('role', 'nurse')->count(),
            'admins' => User::where('role', 'admin')->count(),
        ];

        return response()->json($stats);
    }
}
