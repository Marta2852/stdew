<x-app-layout>
    <div class="max-w-3xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">📋 Checklist</h1>

        @forelse ($items as $item)
            <div class="bg-white p-3 rounded shadow mb-2 flex items-center gap-3">
                {{ $item->is_completed ? '✅' : '⬜' }}
                {{ $item->title }}
            </div>
        @empty
            <p class="text-gray-500">No checklist items yet.</p>
        @endforelse
    </div>
</x-app-layout>