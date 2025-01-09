<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        // Fetch doctors from the database (dummy data for now)
        $doctors = [
            ['id' => 1, 'name' => 'Dr. Alice Johnson', 'specialization' => 'Cardiology'],
            ['id' => 2, 'name' => 'Dr. Bob Brown', 'specialization' => 'Dermatology'],
        ];

        return view('doctors.index', compact('doctors'));
    }
}
