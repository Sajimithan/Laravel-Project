<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller

{
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
        ]);

        Patient::create($request->only('name', 'age'));

        return redirect()->route('patients.index')->with('success', 'Patient added successfully!');
    }

    public function edit(Patient $patient)
    {
        return response()->json($patient);
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
        ]);

        $patient->update($request->only('name', 'age'));

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully!');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully!');
    }
}

