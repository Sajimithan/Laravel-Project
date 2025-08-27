<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Health Tip') }}: {{ $healthTip->title }}
            </h2>
            <div class="flex space-x-2">
                @auth
                    @if(auth()->user()->isAdmin() || auth()->user()->isDoctor())
                        <a href="{{ route('health-tips.edit', $healthTip) }}" 
                           class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md">
                            Edit Tip
                        </a>
                    @endif
                    
                    @if(auth()->user()->isAdmin())
                        <form method="POST" action="{{ route('health-tips.destroy', $healthTip) }}" 
                              class="inline" onsubmit="return confirm('Are you sure you want to delete this tip?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-md">
                                Delete Tip
                            </button>
                        </form>
                    @endif
                @endauth
                
                <a href="{{ route('health-tips.index') }}" 
                   class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded-md">
                    Back to Tips
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Health Tip Content -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-8">
                    <!-- Header -->
                    <div class="mb-6">
                        <div class="flex items-center justify-between mb-4">
                            <h1 class="text-3xl font-bold text-gray-900">{{ $healthTip->title }}</h1>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                {{ $healthTip->category === 'general' ? 'bg-blue-100 text-blue-800' : '' }}
                                {{ $healthTip->category === 'nutrition' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $healthTip->category === 'exercise' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $healthTip->category === 'mental-health' ? 'bg-purple-100 text-purple-800' : '' }}
                                {{ $healthTip->category === 'prevention' ? 'bg-red-100 text-red-800' : '' }}
                                {{ $healthTip->category === 'treatment' ? 'bg-indigo-100 text-indigo-800' : '' }}">
                                {{ ucfirst(str_replace('-', ' ', $healthTip->category)) }}
                            </span>
                        </div>
                        
                        <div class="flex items-center text-sm text-gray-500 space-x-4">
                            <span>Priority: {{ $healthTip->priority }}/10</span>
                            <span>•</span>
                            <span>Created: {{ $healthTip->created_at->format('M d, Y') }}</span>
                            @if($healthTip->author)
                                <span>•</span>
                                <span>By: {{ $healthTip->author->name }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="prose max-w-none">
                        <div class="text-gray-700 leading-relaxed text-lg">
                            {!! nl2br(e($healthTip->content)) !!}
                        </div>
                    </div>
                    
                    <!-- Tags -->
                    @if($healthTip->tags && count($healthTip->tags) > 0)
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <h3 class="text-sm font-medium text-gray-900 mb-3">Tags</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach($healthTip->tags as $tag)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-gray-100 text-gray-800">
                                        {{ $tag }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Related Tips -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Related Health Tips</h3>
                    <div class="text-center text-gray-500">
                        <p>Related tips feature coming soon...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
