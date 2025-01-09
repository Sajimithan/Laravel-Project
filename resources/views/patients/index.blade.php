@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4 text-center">Patient List</h1>

    <!-- Success Message -->
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Add Patient Form -->
    <form action="{{ route('patients.store') }}" method="POST" class="mb-6">
        @csrf
        <div class="flex items-center space-x-4">
            <input type="text" name="name" placeholder="Patient Name" class="border p-2 rounded w-1/3" required>
            <input type="number" name="age" placeholder="Age" class="border p-2 rounded w-1/4" required>
            <select name="gender" class="border p-2 rounded w-1/4" required>
                <option value="" disabled selected>Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-700">Add</button>
        </div>
    </form>

    <!-- Patient Table -->
    <table class="w-full bg-white shadow-md rounded">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Patient ID</th>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Age</th>
                <th class="border px-4 py-2">Gender</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr>
                    <td class="border px-4 py-2">{{ $patient->id }}</td>
                    <td class="border px-4 py-2">{{ $patient->name }}</td>
                    <td class="border px-4 py-2">{{ $patient->age }}</td>
                    <td class="border px-4 py-2">{{ $patient->gender }}</td>
                    <td class="border px-4 py-2 space-x-2">
                        <!-- Edit Button -->
                        <button onclick="editPatient({{ $patient->id }})" class="bg-yellow-500 text-black px-2 py-1 rounded hover:bg-yellow-700">Edit</button>

                        <!-- Delete Form -->
                        <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-black px-2 py-1 rounded hover:bg-red-700">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Edit Modal -->
<div id="edit-modal" class="hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded shadow-lg">
        <h2 class="text-xl mb-4">Edit Patient</h2>
        <form id="edit-form" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="name" id="edit-name" class="border p-2 rounded w-full mb-4" required>
            <input type="number" name="age" id="edit-age" class="border p-2 rounded w-full mb-4" required>
            <select name="gender" id="edit-gender" class="border p-2 rounded w-full mb-4" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-700">Update</button>
            <button type="button" onclick="closeModal()" class="ml-2 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">Cancel</button>
        </form>
    </div>
</div>

<script>
    function editPatient(id) {
        fetch(`/patients/${id}/edit`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(patient => {
            document.getElementById('edit-name').value = patient.name;
            document.getElementById('edit-age').value = patient.age;
            document.getElementById('edit-gender').value = patient.gender;
            document.getElementById('edit-form').action = `/patients/${id}`;
            document.getElementById('edit-modal').classList.remove('hidden');
        });
    }

    function closeModal() {
        document.getElementById('edit-modal').classList.add('hidden');
    }
</script>
@endsection
