@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Doctors Details</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Specialization</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doctors as $doctor)
            <tr>
                <td>{{ $doctor['id'] }}</td>
                <td>{{ $doctor['name'] }}</td>
                <td>{{ $doctor['specialization'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
