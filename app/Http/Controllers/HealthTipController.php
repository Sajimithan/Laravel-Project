<?php

namespace App\Http\Controllers;

use App\Models\HealthTip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HealthTipController extends Controller
{
    /**
     * Display a listing of health tips
     */
    public function index()
    {
        $tips = HealthTip::active()->byPriority()->paginate(10);
        return view('health-tips.index', compact('tips'));
    }

    /**
     * Show the form for creating a new health tip
     */
    public function create()
    {
        // Only admins and doctors can create health tips
        if (!Auth::user()->isAdmin() && !Auth::user()->isDoctor()) {
            abort(403, 'Unauthorized action.');
        }

        return view('health-tips.create');
    }

    /**
     * Store a newly created health tip
     */
    public function store(Request $request)
    {
        // Only admins and doctors can create health tips
        if (!Auth::user()->isAdmin() && !Auth::user()->isDoctor()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|in:general,nutrition,exercise,mental-health,prevention,treatment',
            'priority' => 'integer|min:1|max:10',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:50'
        ]);

        $tip = HealthTip::create([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'priority' => $request->priority ?? 1,
            'author_id' => Auth::id(),
            'tags' => $request->tags
        ]);

        return redirect()->route('health-tips.index')
            ->with('success', 'Health tip created successfully.');
    }

    /**
     * Display the specified health tip
     */
    public function show(HealthTip $healthTip)
    {
        return view('health-tips.show', compact('healthTip'));
    }

    /**
     * Show the form for editing the specified health tip
     */
    public function edit(HealthTip $healthTip)
    {
        // Only admins, doctors, or the author can edit
        if (!Auth::user()->isAdmin() && !Auth::user()->isDoctor() && Auth::id() !== $healthTip->author_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('health-tips.edit', compact('healthTip'));
    }

    /**
     * Update the specified health tip
     */
    public function update(Request $request, HealthTip $healthTip)
    {
        // Only admins, doctors, or the author can update
        if (!Auth::user()->isAdmin() && !Auth::user()->isDoctor() && Auth::id() !== $healthTip->author_id) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|in:general,nutrition,exercise,mental-health,prevention,treatment',
            'priority' => 'integer|min:1|max:10',
            'is_active' => 'boolean',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:50'
        ]);

        $healthTip->update($request->all());

        return redirect()->route('health-tips.index')
            ->with('success', 'Health tip updated successfully.');
    }

    /**
     * Remove the specified health tip
     */
    public function destroy(HealthTip $healthTip)
    {
        // Only admins or the author can delete
        if (!Auth::user()->isAdmin() && Auth::id() !== $healthTip->author_id) {
            abort(403, 'Unauthorized action.');
        }

        $healthTip->delete();

        return redirect()->route('health-tips.index')
            ->with('success', 'Health tip deleted successfully.');
    }

    /**
     * Get health tips by category (API endpoint)
     */
    public function getByCategory($category)
    {
        $tips = HealthTip::getTipsByCategory($category, 5);
        return response()->json($tips);
    }

    /**
     * Get random health tip (API endpoint)
     */
    public function getRandom()
    {
        $tip = HealthTip::getRandomTip();
        return response()->json($tip);
    }

    /**
     * Toggle tip active status
     */
    public function toggleStatus(HealthTip $healthTip)
    {
        // Only admins can toggle status
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $healthTip->update(['is_active' => !$healthTip->is_active]);

        return response()->json([
            'success' => true,
            'is_active' => $healthTip->is_active,
            'message' => 'Health tip status updated successfully.'
        ]);
    }
}
