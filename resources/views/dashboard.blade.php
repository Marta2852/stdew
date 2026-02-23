<x-app-layout>
    <div class="container mx-auto p-6">

        {{--  Overall Progress --}}
        <div class="mb-8 bg-green-100 p-6 rounded-xl shadow">
            <h1 class="text-2xl font-bold mb-2"> Perfection Progress</h1>
            <p class="text-lg">{{ $overallProgress }}%</p>

            <div class="w-full bg-green-200 rounded-full h-4 mt-2">
                <div class="bg-green-600 h-4 rounded-full"
                     style="width: {{ $overallProgress }}%">
                </div>
            </div>

            <p class="mt-2 text-sm">
                Completed {{ $completedItems }} of {{ $totalItems }} items
            </p>
        </div>

    {{--  Categories --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        @foreach ($categories as $category)
            @php
                $total = $category->items->count();
                $done = $category->items->where('is_completed', true)->count();
                $percent = $total > 0 ? round(($done / $total) * 100) : 0;
            @endphp

            <div class="bg-white p-5 rounded-xl shadow">
                <h2 class="text-xl font-semibold">{{ $category->name }}</h2>
                <p class="text-sm mt-1">{{ $done }} / {{ $total }} completed</p>

                <div class="w-full bg-gray-200 rounded-full h-3 mt-2">
                    <div class="bg-green-500 h-3 rounded-full"
                         style="width: {{ $percent }}%">
                    </div>
                </div>

                <a href="{{ route('categories.show', $category->id) }}"
                   class="inline-block mt-3 text-green-700 font-medium">
                    View →
                </a>
            </div>
        @endforeach
    </div>

    {{--  Active Goals --}}
    <div class="mb-8">
        <h2 class="text-xl font-bold mb-3">🗓 Active Goals</h2>

        @forelse ($activeItems as $item)
            <div class="bg-white p-3 rounded shadow mb-2">
                 {{ $item->title }}
            </div>
        @empty
            <p class="text-gray-500">All tasks completed 🎉</p>
        @endforelse
    </div>

    {{--  Recently Completed --}}
    <div>
        <h2 class="text-xl font-bold mb-3"> Recently Completed</h2>

        @forelse ($recentCompleted as $item)
            <div class="bg-green-50 p-3 rounded shadow mb-2">
                 {{ $item->title }}
            </div>
        @empty
            <p class="text-gray-500">No completed items yet</p>
        @endforelse
    </div>

    <a href="{{ route('categories.create') }}" class="text-green-700"> Add Category</a>
    <a href="{{ route('items.create') }}" class="ml-4 text-green-700"> Add Item</a>

    </div>
</x-app-layout>