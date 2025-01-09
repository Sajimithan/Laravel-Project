<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create()
    {
        // Dummy data for available doctors
        $doctors = [
            ['id' => 1, 'name' => 'Dr. Alice Johnson'],
            ['id' => 2, 'name' => 'Dr. Bob Brown'],
        ];

        return view('appointments.create', compact('doctors'));
    }

    public function store(Request $request)
    {
        // Validate appointment data
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'doctor_id' => 'required|integer',
            'appointment_date' => 'required|date',
        ]);

        // Store appointment in the database (dummy response for now)
        return back()->with('success', 'Appointment booked successfully!');
    }
}
