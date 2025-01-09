<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @section('content')
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white flex flex-col">
            <div class="h-16 flex items-center justify-center text-lg font-semibold border-b border-gray-700">
                Health Care System
            </div>
            <nav class="flex-1">
                <ul class="space-y-2 px-4 mt-4">
                    <li>
                        <a href="{{ route('dashboard') }}" class="block py-2 px-4 rounded hover:bg-gray-700">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('patients.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">
                            Patient List
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('doctors.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">
                            Doctors Details
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('appointments.create') }}" class="block py-2 px-4 rounded hover:bg-gray-700">
                            Book Appointment
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h3 class="font-semibold text-lg text-gray-800 mb-4">Welcome to the Dashboard</h3>
                <p class="text-gray-700">
                    {{ __("You're logged in!") }}
                </p>
            </div>

            <!-- Additional Links for Patients, Doctors, and Appointments -->
            <div class="mt-6 bg-white shadow-md rounded-lg">
                <div class="p-6">
                    <h3 class="font-semibold text-lg text-gray-800 mb-4">Quick Actions</h3>
                    <ul class="list-disc list-inside">
                        <li>
                            <a href="{{ route('patients.index') }}" class="text-blue-600 hover:underline">
                                View Patient List
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('doctors.index') }}" class="text-blue-600 hover:underline">
                                View Doctors Details
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('appointments.create') }}" class="text-blue-600 hover:underline">
                                Book an Appointment
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
