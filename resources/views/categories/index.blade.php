<x-app-layout>
    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Categories</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse($categories as $category)
                @php
                    $totalItems = $category->items->count();
                    $completedItems = $category->items->where('is_completed', true)->count();
                    $progress = $totalItems > 0 ? ($completedItems / $totalItems) * 100 : 0;
                @endphp

                <div class="bg-gray-800 rounded-xl shadow p-4 flex flex-col justify-between hover:shadow-lg transition">
                    <div>
                        <h2 class="text-lg font-bold mb-2">{{ $category->name }}</h2>

                        <p class="text-sm text-gray-500 mb-2">
                            {{ $completedItems }} / {{ $totalItems }} items completed
                        </p>

                        {{-- Progress Bar --}}
                        <div class="w-full bg-gray-200 rounded-full h-2 mb-3">
                            <div class="bg-green-500 h-2 rounded-full" style="width: {{ $progress }}%;"></div>
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="flex justify-between items-center mt-2">
                        <a href="{{ route('items.create', ['category_id' => $category->id]) }}" class="text-xs text-blue-500 hover:underline">
                            + Add Item
                        </a>
                        <a href="{{ route('categories.edit', $category) }}" class="text-xs text-gray-600 hover:underline">
                            Edit
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 col-span-full text-center">No categories yet. Add one!</p>
            @endforelse
        </div>

        {{-- Add New Category --}}
        <div class="mt-6">
            <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                + Add New Category
            </a>
        </div>
    </div>
</x-app-layout>