<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home route
Route::get('/', function () {
    return view('welcome');
});

// Default dashboard route with authentication middleware
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes for Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes for managing patients, doctors, and appointments
Route::middleware(['auth'])->group(function () {
    // Patient Management Routes
    Route::get('/patients', [PatientController::class, 'index'])->name('patients.index'); // View all patients
    Route::post('/patients', [PatientController::class, 'store'])->name('patients.store'); // Add a patient
    Route::get('/patients/{patient}/edit', [PatientController::class, 'edit'])->name('patients.edit'); // Edit a patient
    Route::put('/patients/{patient}', [PatientController::class, 'update'])->name('patients.update'); // Update a patient
    Route::delete('/patients/{patient}', [PatientController::class, 'destroy'])->name('patients.destroy'); // Delete a patient

    // Doctor Management Route
    Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index'); // View all doctors

    // Appointment Management Routes
    Route::get('/appointments', [AppointmentController::class, 'create'])->name('appointments.create'); // Appointment form
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store'); // Submit an appointment
});

// Default login and register routes (added for Laravel Breeze authentication)
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Require auth routes for login, register, etc.
require __DIR__.'/auth.php';
