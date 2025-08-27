<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Message -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Welcome back, {{ Auth::user()->name }}!</h3>
                    <p class="text-gray-600">You're logged in as a <span class="font-medium text-indigo-600">{{ Auth::user()->role_name }}</span></p>
                </div>
            </div>

            <!-- Quick Actions Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <!-- Health Dashboard -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-2 rounded-full bg-blue-100">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-medium text-gray-900">Health Dashboard</h4>
                                <p class="text-sm text-gray-500">View and update your health information</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('users.health-dashboard') }}" 
                               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md">
                                Go to Dashboard
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Health Tips -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-2 rounded-full bg-green-100">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-medium text-gray-900">Health Tips</h4>
                                <p class="text-sm text-gray-500">Browse helpful health advice and tips</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('health-tips.index') }}" 
                               class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-md">
                                View Tips
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Profile Management -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-2 rounded-full bg-purple-100">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-medium text-gray-900">Profile</h4>
                                <p class="text-sm text-gray-500">Manage your account settings</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('profile.edit') }}" 
                               class="inline-flex items-center px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-md">
                                Edit Profile
                            </a>
                        </div>
                    </div>
                </div>

                @if(Auth::user()->isAdmin())
                <!-- User Management (Admin Only) -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-2 rounded-full bg-red-100">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-medium text-gray-900">User Management</h4>
                                <p class="text-sm text-gray-500">Manage system users and roles</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('users.index') }}" 
                               class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md">
                                Manage Users
                            </a>
                        </div>
                    </div>
                </div>
                @endif

                @if(Auth::user()->isAdmin() || Auth::user()->isDoctor())
                <!-- Health Tips Management -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-2 rounded-full bg-yellow-100">
                                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-medium text-gray-900">Manage Tips</h4>
                                <p class="text-sm text-gray-500">Create and edit health tips</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('health-tips.create') }}" 
                               class="inline-flex items-center px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white text-sm font-medium rounded-md">
                                Create Tip
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <!-- Recent Activity or Quick Stats -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Quick Overview</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-indigo-600">{{ Auth::user()->age ?? 'N/A' }}</div>
                            <div class="text-sm text-gray-500">Age</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-green-600">{{ Auth::user()->bmi ?? 'N/A' }}</div>
                            <div class="text-sm text-gray-500">BMI</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-purple-600">{{ Auth::user()->blood_type ?? 'N/A' }}</div>
                            <div class="text-sm text-gray-500">Blood Type</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
