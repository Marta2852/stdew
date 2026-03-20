<x-app-layout>
    <div class="max-w-6xl mx-auto p-6">
        {{-- Overall Progress Bar --}}
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-3">Overall Checklist Progress</h2>
            <div class="bg-gray-800 rounded-lg p-4">
                <div class="flex justify-between mb-2">
                    <span class="text-sm text-gray-400">{{ $completedItems }} / {{ $totalItems }} items completed</span>
                    <span class="text-sm font-semibold">{{ number_format($overallProgress, 1) }}%</span>
                </div>
                <div class="w-full bg-gray-700 rounded-full h-3">
                    <div class="bg-green-500 h-3 rounded-full" style="width: {{ $overallProgress }}%;"></div>
                </div>
            </div>
        </div>

        {{-- Categories Section --}}
        <div class="mb-8">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Categories</h2>
                <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition text-sm">
                    + Create New Category
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @forelse($categories as $category)
                    @php
                        $catTotalItems = $category->items->count();
                        $catCompletedItems = $category->items->where('is_completed', true)->count();
                        $catProgress = $catTotalItems > 0 ? ($catCompletedItems / $catTotalItems) * 100 : 0;
                    @endphp

                    <div class="bg-gray-800 rounded-xl shadow p-4 flex flex-col justify-between hover:shadow-lg transition">
                        <div>
                            <h3 class="text-lg font-bold mb-2">{{ $category->name }}</h3>

                            <p class="text-sm text-gray-500 mb-2">
                                {{ $catCompletedItems }} / {{ $catTotalItems }} items
                            </p>

                            {{-- Mini Progress Bar --}}
                            <div class="w-full bg-gray-700 rounded-full h-2 mb-3">
                                <div class="bg-green-500 h-2 rounded-full" style="width: {{ $catProgress }}%;"></div>
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
                    <p class="text-gray-500 col-span-full text-center">No categories yet. Create one!</p>
                @endforelse
            </div>
        </div>

        {{-- Checklist Section --}}
        <div>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Checklist Items</h2>
                <a href="{{ route('items.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition text-sm">
                    + Add New Item
                </a>
            </div>

            

            {{-- Grouped by Category View --}}
            @forelse($items->groupBy('category.name') as $categoryName => $group)
                <div class="mb-8">
                    <h3 class="text-xl font-bold mt-6 mb-4 text-gray-200">{{ $categoryName ?? 'Uncategorized' }}</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($group as $item)
                            <div class="bg-gray-800 rounded-lg shadow p-4 hover:shadow-lg transition">
                                <div class="flex items-start gap-3">
                                    <form method="POST" action="{{ route('items.toggle', $item) }}" class="flex-shrink-0">
                                        @csrf
                                        @method('PATCH')
                                        <input type="checkbox" onchange="this.form.submit()" {{ $item->is_completed ? 'checked' : '' }} class="w-5 h-5 cursor-pointer">
                                    </form>

                                    <div class="flex-1 min-w-0">
                                        <div id="display-{{ $item->id }}">
                                            <h4 class="text-base font-semibold mb-1 break-words">{{ $item->title }}</h4>
                                            <p class="text-xs text-gray-500 mb-2">{{ $item->category->name }}</p>
                                            <p class="text-xs font-semibold {{ $item->is_completed ? 'text-green-500' : 'text-gray-500' }}">
                                                {{ $item->is_completed ? '✅ Completed' : '❌ Not Completed' }}
                                            </p>
                                        </div>

                                        <div id="edit-{{ $item->id }}" class="hidden">
                                            <form method="POST" action="{{ route('items.update', $item) }}" class="flex flex-col gap-2">
                                                @csrf
                                                @method('PUT')
                                                <input type="text" name="title" value="{{ $item->title }}" class="border rounded px-2 py-1 text-sm" required>
                                                <div class="flex gap-2">
                                                    <button class="bg-green-600 text-white px-2 py-1 rounded text-xs">Save</button>
                                                    <button type="button" onclick="cancelEdit({{ $item->id }})" class="text-gray-600 px-2 text-xs">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="flex-shrink-0">
                                        <button type="button" onclick="showEdit({{ $item->id }})" class="text-xs text-blue-500 hover:underline">Edit</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @empty
                <p class="text-gray-500 text-center">No checklist items yet. Add some!</p>
            @endforelse
        </div>
    </div>

    <script>
        function showEdit(id) {
            document.getElementById('display-' + id).classList.add('hidden');
            document.getElementById('edit-' + id).classList.remove('hidden');
        }

        function cancelEdit(id) {
            document.getElementById('edit-' + id).classList.add('hidden');
            document.getElementById('display-' + id).classList.remove('hidden');
        }
    </script>
</x-app-layout>