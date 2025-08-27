<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Health Tip') }}: {{ $healthTip->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('health-tips.update', $healthTip) }}" class="space-y-6">
                        @csrf
                        @method('PATCH')
                        
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $healthTip->title) }}" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                            <textarea name="content" id="content" rows="8" required
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                      placeholder="Write your health tip content here...">{{ old('content', $healthTip->content) }}</textarea>
                            @error('content')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                                <select name="category" id="category" required
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="">Select Category</option>
                                    <option value="general" {{ old('category', $healthTip->category) === 'general' ? 'selected' : '' }}>General</option>
                                    <option value="nutrition" {{ old('category', $healthTip->category) === 'nutrition' ? 'selected' : '' }}>Nutrition</option>
                                    <option value="exercise" {{ old('category', $healthTip->category) === 'exercise' ? 'selected' : '' }}>Exercise</option>
                                    <option value="mental-health" {{ old('category', $healthTip->category) === 'mental-health' ? 'selected' : '' }}>Mental Health</option>
                                    <option value="prevention" {{ old('category', $healthTip->category) === 'prevention' ? 'selected' : '' }}>Prevention</option>
                                    <option value="treatment" {{ old('category', $healthTip->category) === 'treatment' ? 'selected' : '' }}>Treatment</option>
                                </select>
                                @error('category')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="priority" class="block text-sm font-medium text-gray-700">Priority (1-10)</label>
                                <input type="number" name="priority" id="priority" value="{{ old('priority', $healthTip->priority) }}" min="1" max="10"
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                @error('priority')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            @if(Auth::user()->isAdmin())
                            <div>
                                <label for="is_active" class="block text-sm font-medium text-gray-700">Status</label>
                                <select name="is_active" id="is_active"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="1" {{ old('is_active', $healthTip->is_active) ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('is_active', $healthTip->is_active) ? '' : 'selected' }}>Inactive</option>
                                </select>
                                @error('is_active')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            @endif
                        </div>
                        
                        <div>
                            <label for="tags" class="block text-sm font-medium text-gray-700">Tags (comma-separated)</label>
                            <input type="text" name="tags" id="tags" 
                                   value="{{ old('tags', $healthTip->tags ? implode(', ', $healthTip->tags) : '') }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                   placeholder="e.g., health, wellness, nutrition">
                            <p class="mt-1 text-sm text-gray-500">Enter tags separated by commas to help categorize this tip</p>
                            @error('tags')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="flex justify-end space-x-3">
                            <a href="{{ route('health-tips.show', $healthTip) }}" 
                               class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded-md">
                                Cancel
                            </a>
                            <button type="submit" 
                                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Update Health Tip
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Convert comma-separated tags to array format for backend
        document.querySelector('form').addEventListener('submit', function(e) {
            const tagsInput = document.getElementById('tags');
            const tags = tagsInput.value.split(',').map(tag => tag.trim()).filter(tag => tag.length > 0);
            tagsInput.value = JSON.stringify(tags);
        });
    </script>
    @endpush
</x-app-layout>
