<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Health Tips') }}
            </h2>
            @auth
                @if(auth()->user()->isAdmin() || auth()->user()->isDoctor())
                    <a href="{{ route('health-tips.create') }}" 
                       class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md">
                        Add New Tip
                    </a>
                @endif
            @endauth
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Category Filter -->
            <div class="mb-6">
                <div class="flex flex-wrap gap-2">
                    <button onclick="filterByCategory('all')" 
                            class="category-filter bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700"
                            data-category="all">
                        All Categories
                    </button>
                    <button onclick="filterByCategory('general')" 
                            class="category-filter bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300"
                            data-category="general">
                        General
                    </button>
                    <button onclick="filterByCategory('nutrition')" 
                            class="category-filter bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300"
                            data-category="nutrition">
                        Nutrition
                    </button>
                    <button onclick="filterByCategory('exercise')" 
                            class="category-filter bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300"
                            data-category="exercise">
                        Exercise
                    </button>
                    <button onclick="filterByCategory('mental-health')" 
                            class="category-filter bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300"
                            data-category="mental-health">
                        Mental Health
                    </button>
                    <button onclick="filterByCategory('prevention')" 
                            class="category-filter bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300"
                            data-category="prevention">
                        Prevention
                    </button>
                    <button onclick="filterByCategory('treatment')" 
                            class="category-filter bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300"
                            data-category="treatment">
                        Treatment
                    </button>
                </div>
            </div>

            <!-- Health Tips Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="health-tips-grid">
                @foreach($tips as $tip)
                    <div class="health-tip-card bg-white overflow-hidden shadow-sm sm:rounded-lg" 
                         data-category="{{ $tip->category }}">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-lg font-medium text-gray-900">{{ $tip->title }}</h3>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                    {{ $tip->category === 'general' ? 'bg-blue-100 text-blue-800' : '' }}
                                    {{ $tip->category === 'nutrition' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $tip->category === 'exercise' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ $tip->category === 'mental-health' ? 'bg-purple-100 text-purple-800' : '' }}
                                    {{ $tip->category === 'prevention' ? 'bg-red-100 text-red-800' : '' }}
                                    {{ $tip->category === 'treatment' ? 'bg-indigo-100 text-indigo-800' : '' }}">
                                    {{ ucfirst(str_replace('-', ' ', $tip->category)) }}
                                </span>
                            </div>
                            
                            <p class="text-gray-600 mb-4">{{ Str::limit($tip->content, 150) }}</p>
                            
                            @if($tip->tags)
                                <div class="mb-4">
                                    <div class="flex flex-wrap gap-1">
                                        @foreach($tip->tags as $tag)
                                            <span class="inline-flex items-center px-2 py-1 rounded-md text-xs font-medium bg-gray-100 text-gray-800">
                                                {{ $tag }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            
                            <div class="flex justify-between items-center">
                                <div class="text-sm text-gray-500">
                                    Priority: {{ $tip->priority }}/10
                                </div>
                                
                                <div class="flex space-x-2">
                                    <a href="{{ route('health-tips.show', $tip) }}" 
                                       class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">
                                        Read More
                                    </a>
                                    
                                    @auth
                                        @if(auth()->user()->isAdmin() || auth()->user()->isDoctor())
                                            <a href="{{ route('health-tips.edit', $tip) }}" 
                                               class="text-green-600 hover:text-green-900 text-sm font-medium">
                                                Edit
                                            </a>
                                        @endif
                                        
                                        @if(auth()->user()->isAdmin())
                                            <form method="POST" action="{{ route('health-tips.destroy', $tip) }}" 
                                                  class="inline" onsubmit="return confirm('Are you sure you want to delete this tip?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="text-red-600 hover:text-red-900 text-sm font-medium">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $tips->links() }}
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function filterByCategory(category) {
            // Update active filter button
            document.querySelectorAll('.category-filter').forEach(btn => {
                btn.classList.remove('bg-indigo-600', 'text-white');
                btn.classList.add('bg-gray-200', 'text-gray-700');
            });
            
            event.target.classList.remove('bg-gray-200', 'text-gray-700');
            event.target.classList.add('bg-indigo-600', 'text-white');
            
            // Filter tips
            const tips = document.querySelectorAll('.health-tip-card');
            tips.forEach(tip => {
                if (category === 'all' || tip.dataset.category === category) {
                    tip.style.display = 'block';
                } else {
                    tip.style.display = 'none';
                }
            });
        }
    </script>
    @endpush
</x-app-layout>
