@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Book Appointment</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('appointments.store') }}">
        @csrf
        <div class="mb-3">
            <label for="patient_name" class="form-label">Patient Name</label>
            <input type="text" class="form-control" id="patient_name" name="patient_name" required>
        </div>
        <div class="mb-3">
            <label for="doctor_id" class="form-label">Select Doctor</label>
            <select class="form-select" id="doctor_id" name="doctor_id" required>
                <option value="">-- Select a Doctor --</option>
                @foreach ($doctors as $doctor)
                <option value="{{ $doctor['id'] }}">{{ $doctor['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="appointment_date" class="form-label">Appointment Date</label>
            <input type="date" class="form-control" id="appointment_date" name="appointment_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Book Appointment</button>
    </form>
</div>
@endsection
