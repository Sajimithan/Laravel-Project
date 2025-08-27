<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Health Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Health Overview Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- BMI Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-2 rounded-full bg-blue-100">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">BMI</p>
                                <p class="text-2xl font-semibold text-gray-900">
                                    {{ $user->bmi ?? 'N/A' }}
                                </p>
                                <p class="text-sm text-gray-500">{{ $user->bmi_category ?? 'Unknown' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Age Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-2 rounded-full bg-green-100">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Age</p>
                                <p class="text-2xl font-semibold text-gray-900">
                                    {{ $user->age ?? 'N/A' }} years
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Blood Type Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-2 rounded-full bg-red-100">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Blood Type</p>
                                <p class="text-2xl font-semibold text-gray-900">
                                    {{ $user->blood_type ?? 'Unknown' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Last Checkup Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-2 rounded-full bg-purple-100">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Last Checkup</p>
                                <p class="text-2xl font-semibold text-gray-900">
                                    {{ $user->last_checkup_date ? $user->last_checkup_date->format('M Y') : 'Never' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Health Information Form -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Update Health Information</h3>
                    
                    <form method="POST" action="{{ route('users.update-health') }}" class="space-y-6">
                        @csrf
                        @method('PATCH')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Basic Information -->
                            <div class="space-y-4">
                                <div>
                                    <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                                    <input type="number" name="age" id="age" value="{{ $user->age }}" 
                                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                                
                                <div>
                                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                                    <select name="gender" id="gender" 
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        <option value="">Select Gender</option>
                                        <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ $user->gender === 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="blood_type" class="block text-sm font-medium text-gray-700">Blood Type</label>
                                    <select name="blood_type" id="blood_type" 
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        <option value="">Select Blood Type</option>
                                        <option value="A+" {{ $user->blood_type === 'A+' ? 'selected' : '' }}>A+</option>
                                        <option value="A-" {{ $user->blood_type === 'A-' ? 'selected' : '' }}>A-</option>
                                        <option value="B+" {{ $user->blood_type === 'B+' ? 'selected' : '' }}>B+</option>
                                        <option value="B-" {{ $user->blood_type === 'B-' ? 'selected' : '' }}>B-</option>
                                        <option value="AB+" {{ $user->blood_type === 'AB+' ? 'selected' : '' }}>AB+</option>
                                        <option value="AB-" {{ $user->blood_type === 'AB-' ? 'selected' : '' }}>AB-</option>
                                        <option value="O+" {{ $user->blood_type === 'O+' ? 'selected' : '' }}>O+</option>
                                        <option value="O-" {{ $user->blood_type === 'O-' ? 'selected' : '' }}>O-</option>
                                    </select>
                                </div>
                            </div>
                            
                            <!-- Physical Measurements -->
                            <div class="space-y-4">
                                <div>
                                    <label for="height" class="block text-sm font-medium text-gray-700">Height (cm)</label>
                                    <input type="number" name="height" id="height" value="{{ $user->height }}" 
                                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                                
                                <div>
                                    <label for="weight" class="block text-sm font-medium text-gray-700">Weight (kg)</label>
                                    <input type="number" name="weight" id="weight" value="{{ $user->weight }}" 
                                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                                
                                <div>
                                    <label for="last_checkup_date" class="block text-sm font-medium text-gray-700">Last Checkup Date</label>
                                    <input type="date" name="last_checkup_date" id="last_checkup_date" 
                                           value="{{ $user->last_checkup_date ? $user->last_checkup_date->format('Y-m-d') : '' }}" 
                                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Health Conditions -->
                        <div class="space-y-4">
                            <div>
                                <label for="allergies" class="block text-sm font-medium text-gray-700">Allergies</label>
                                <textarea name="allergies" id="allergies" rows="3" 
                                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                          placeholder="List any allergies you have...">{{ $user->allergies }}</textarea>
                            </div>
                            
                            <div>
                                <label for="medications" class="block text-sm font-medium text-gray-700">Current Medications</label>
                                <textarea name="medications" id="medications" rows="3" 
                                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                          placeholder="List any medications you're currently taking...">{{ $user->medications }}</textarea>
                            </div>
                        </div>
                        
                        <div class="flex justify-end">
                            <button type="submit" 
                                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Update Health Information
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Health Tips Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Today's Health Tips</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" id="health-tips-container">
                        <!-- Health tips will be loaded here via JavaScript -->
                        <div class="text-center text-gray-500">Loading health tips...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Load health tips when page loads
        document.addEventListener('DOMContentLoaded', function() {
            loadHealthTips();
        });

        function loadHealthTips() {
            fetch('/api/health-tips/random')
                .then(response => response.json())
                .then(tip => {
                    if (tip) {
                        displayHealthTip(tip);
                    }
                })
                .catch(error => {
                    console.error('Error loading health tip:', error);
                    document.getElementById('health-tips-container').innerHTML = 
                        '<div class="text-center text-gray-500">Unable to load health tips at this time.</div>';
                });
        }

        function displayHealthTip(tip) {
            const container = document.getElementById('health-tips-container');
            container.innerHTML = `
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <h4 class="font-medium text-blue-900 mb-2">${tip.title}</h4>
                    <p class="text-blue-800 text-sm">${tip.content}</p>
                    <div class="mt-3">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            ${tip.category}
                        </span>
                    </div>
                </div>
            `;
        }
    </script>
    @endpush
</x-app-layout>
