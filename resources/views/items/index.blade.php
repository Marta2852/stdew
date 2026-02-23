<x-app-layout>
    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Checklist Items</h1>

        <div class="mb-4">
            Sort:
            <a href="{{ route('items.index') }}" class="mr-2 {{ request('sort') ? 'text-gray-500' : 'font-semibold' }}">Default</a>
            <a href="{{ route('items.index', ['sort' => 'category']) }}" class="{{ request('sort') === 'category' ? 'font-semibold' : 'text-gray-500' }}">Category</a>
        </div>

        @if(isset($sort) && $sort === 'category')
            @forelse($items->groupBy('category.name') as $categoryName => $group)
                <h2 class="text-2xl font-bold mt-6 col-span-full">{{ $categoryName ?? 'Uncategorized' }}</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-2">
                    @foreach($group as $item)
                        <div class="bg-gray-800 rounded-xl shadow p-4 hover:shadow-lg transition w-full">
                            <div class="flex items-start gap-3">
                                <form method="POST" action="{{ route('items.toggle', $item) }}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="checkbox" onchange="this.form.submit()" {{ $item->is_completed ? 'checked' : '' }}>
                                </form>

                                <div class="flex-1">
                                    <div id="display-{{ $item->id }}">
                                        <h2 class="text-lg font-bold mb-1">{{ $item->title }}</h2>
                                        <p class="text-xs text-gray-500 mb-2">Category: {{ $item->category->name }}</p>
                                        <p class="text-sm font-semibold {{ $item->is_completed ? 'text-green-600' : 'text-gray-600' }}">{{ $item->is_completed ? ' Completed' : ' Not Completed' }}</p>
                                    </div>

                                    <div id="edit-{{ $item->id }}" class="hidden">
                                        <form method="POST" action="{{ route('items.update', $item) }}" class="flex gap-2">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="title" value="{{ $item->title }}" class="border rounded px-2 py-1 w-full" required>
                                            <button class="bg-green-600 text-white px-3 py-1 rounded">Save</button>
                                            <button type="button" onclick="cancelEdit({{ $item->id }})" class="text-gray-600 px-2">Cancel</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="ml-2">
                                    <button type="button" onclick="showEdit({{ $item->id }})" class="text-sm text-blue-600">Edit</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @empty
                <p class="text-gray-500 col-span-full text-center">No checklist items yet. Add some!</p>
            @endforelse
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @forelse($items as $item)
                    <div class="bg-gray-800 rounded-xl shadow p-4 hover:shadow-lg transition w-full">
                        <div class="flex items-start gap-3">
                            <form method="POST" action="{{ route('items.toggle', $item) }}">
                                @csrf
                                @method('PATCH')
                                <input type="checkbox" onchange="this.form.submit()" {{ $item->is_completed ? 'checked' : '' }}>
                            </form>

                            <div class="flex-1">
                                <div id="display-{{ $item->id }}">
                                    <h2 class="text-lg font-bold mb-1">{{ $item->title }}</h2>
                                    <p class="text-xs text-gray-500 mb-2">Category: {{ $item->category->name }}</p>
                                    <p class="text-sm font-semibold {{ $item->is_completed ? 'text-green-600' : 'text-gray-600' }}">{{ $item->is_completed ? '✅ Completed' : '❌ Not Completed' }}</p>
                                </div>

                                <div id="edit-{{ $item->id }}" class="hidden">
                                    <form method="POST" action="{{ route('items.update', $item) }}" class="flex gap-2">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="title" value="{{ $item->title }}" class="border rounded px-2 py-1 w-full" required>
                                        <button class="bg-green-600 text-white px-3 py-1 rounded">Save</button>
                                        <button type="button" onclick="cancelEdit({{ $item->id }})" class="text-gray-600 px-2">Cancel</button>
                                    </form>
                                </div>
                            </div>

                            <div class="ml-2">
                                <button type="button" onclick="showEdit({{ $item->id }})" class="text-sm text-blue-600">Edit</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 col-span-full text-center">No checklist items yet. Add some!</p>
                @endforelse
            </div>
        @endif

        {{-- Add New Item --}}
        <div class="mt-6">
            <a href="{{ route('items.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                + Add New Item
            </a>
        </div>
    
    <script>
        function showEdit(id) {
            const display = document.getElementById('display-' + id);
            const edit = document.getElementById('edit-' + id);
            if (display) display.classList.add('hidden');
            if (edit) edit.classList.remove('hidden');
        }

        function cancelEdit(id) {
            const display = document.getElementById('display-' + id);
            const edit = document.getElementById('edit-' + id);
            if (edit) edit.classList.add('hidden');
            if (display) display.classList.remove('hidden');
        }
    </script>
    </div>
</x-app-layout>