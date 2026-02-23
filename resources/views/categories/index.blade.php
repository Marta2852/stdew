<x-app-layout>
    <div class="max-w-3xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">📂 Categories</h1>

        @forelse ($categories as $category)
            <div class="bg-white p-3 rounded shadow mb-2 flex items-center justify-between">
                {{ $category->name }}

                <a href="{{ route('categories.show', $category) }}" class="text-green-700">
                    View
                </a>
            </div>
        @empty
            <p class="text-gray-500">No categories yet.</p>
        @endforelse
    </div>
</x-app-layout>