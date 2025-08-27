<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User Profile') }}: {{ $user->name }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('users.edit', $user) }}" 
                   class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md">
                    Edit User
                </a>
                <a href="{{ route('users.index') }}" 
                   class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded-md">
                    Back to Users
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <!-- User Information Cards -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Basic Information -->
                <div class="lg:col-span-1">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Basic Information</h3>
                            
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-16 w-16">
                                        <div class="h-16 w-16 rounded-full bg-indigo-100 flex items-center justify-center">
                                            <span class="text-indigo-800 font-medium text-xl">
                                                {{ strtoupper(substr($user->name, 0, 2)) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-xl font-medium text-gray-900">{{ $user->name }}</h4>
                                        <p class="text-gray-500">{{ $user->email }}</p>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium mt-2
                                            {{ $user->role === 'admin' ? 'bg-red-100 text-red-800' : '' }}
                                            {{ $user->role === 'doctor' ? 'bg-blue-100 text-blue-800' : '' }}
                                            {{ $user->role === 'nurse' ? 'bg-green-100 text-green-800' : '' }}
                                            {{ $user->role === 'patient' ? 'bg-gray-100 text-gray-800' : '' }}">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="border-t pt-4">
                                    <dl class="space-y-3">
                                        <div>
                                            <dt class="text-sm font-medium text-gray-500">Age</dt>
                                            <dd class="text-sm text-gray-900">{{ $user->age ?? 'Not specified' }}</dd>
                                        </div>
                                        <div>
                                            <dt class="text-sm font-medium text-gray-500">Gender</dt>
                                            <dd class="text-sm text-gray-900">{{ ucfirst($user->gender ?? 'Not specified') }}</dd>
                                        </div>
                                        <div>
                                            <dt class="text-sm font-medium text-gray-500">Phone</dt>
                                            <dd class="text-sm text-gray-900">{{ $user->phone ?? 'Not specified' }}</dd>
                                        </div>
                                        <div>
                                            <dt class="text-sm font-medium text-gray-500">Emergency Contact</dt>
                                            <dd class="text-sm text-gray-900">{{ $user->emergency_contact ?? 'Not specified' }}</dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Health Information -->
                <div class="lg:col-span-2">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Health Information</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-4">
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Blood Type</dt>
                                        <dd class="text-sm text-gray-900">{{ $user->blood_type ?? 'Not specified' }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Height</dt>
                                        <dd class="text-sm text-gray-900">{{ $user->height ? $user->height . ' cm' : 'Not specified' }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Weight</dt>
                                        <dd class="text-sm text-gray-900">{{ $user->weight ? $user->weight . ' kg' : 'Not specified' }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">BMI</dt>
                                        <dd class="text-sm text-gray-900">
                                            {{ $user->bmi ?? 'Not calculated' }}
                                            @if($user->bmi_category)
                                                <span class="ml-2 text-xs text-gray-500">({{ $user->bmi_category }})</span>
                                            @endif
                                        </dd>
                                    </div>
                                </div>
                                
                                <div class="space-y-4">
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Last Checkup</dt>
                                        <dd class="text-sm text-gray-900">
                                            {{ $user->last_checkup_date ? $user->last_checkup_date->format('M d, Y') : 'Not specified' }}
                                        </dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Insurance Provider</dt>
                                        <dd class="text-sm text-gray-900">{{ $user->insurance_provider ?? 'Not specified' }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Insurance Number</dt>
                                        <dd class="text-sm text-gray-900">{{ $user->insurance_number ?? 'Not specified' }}</dd>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Medical Conditions -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Medical Conditions</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 mb-2">Allergies</dt>
                                    <dd class="text-sm text-gray-900">
                                        @if($user->allergies)
                                            <div class="bg-gray-50 p-3 rounded-md">
                                                {{ $user->allergies }}
                                            </div>
                                        @else
                                            <span class="text-gray-400">None specified</span>
                                        @endif
                                    </dd>
                                </div>
                                
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 mb-2">Current Medications</dt>
                                    <dd class="text-sm text-gray-900">
                                        @if($user->medications)
                                            <div class="bg-gray-50 p-3 rounded-md">
                                                {{ $user->medications }}
                                            </div>
                                        @else
                                            <span class="text-gray-400">None specified</span>
                                        @endif
                                    </dd>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Address Information -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Address Information</h3>
                            
                            <div>
                                <dt class="text-sm font-medium text-gray-500 mb-2">Full Address</dt>
                                <dd class="text-sm text-gray-900">
                                    @if($user->address)
                                        <div class="bg-gray-50 p-3 rounded-md">
                                            {{ $user->address }}
                                        </div>
                                    @else
                                        <span class="text-gray-400">Not specified</span>
                                    @endif
                                </dd>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
