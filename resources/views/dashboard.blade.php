<x-app-layout>
    <div class="container mx-auto p-6">

        {{--  Overall Progress --}}
        <div class="mb-8 bg-green-100 p-6 rounded-xl shadow">
            <h1 class="text-2xl font-bold mb-2"> Perfection Progress</h1>
            <p class="text-lg">{{ $overallProgress }}%</p>

            <div class="w-full progress-track rounded-full mt-2">
                <span class="progress-fill" style="width: {{ $overallProgress }}%"></span>
            </div>

            <p class="mt-2 text-sm">
                Completed {{ $completedItems }} of {{ $totalItems }} items
            </p>
        </div>

    {{-- Achievements Preview --}}
<div class="p-6 bg-purple-100 rounded-xl shadow mb-6">
    <h2 class="text-xl font-bold mb-4"> Recent Achievements</h2>
    <div class="mb-4">
        <h3 class="text-sm font-semibold">Overall Achievements Progress</h3>
        <div class="flex items-center gap-4 mt-2">
            <div class="flex-1">
                <div class="w-full progress-track rounded-full h-3">
                    <span class="progress-fill" style="width: {{ $achievementProgress }}%"></span>
                </div>
                <p class="text-xs text-gray-400 mt-1">{{ $unlockedAchievements }} of {{ $totalAchievements }} unlocked ({{ $achievementProgress }}%)</p>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
        @forelse($recentAchievements as $achievement)
            <div class="flex flex-col items-center bg-gray-800 rounded-xl shadow p-3">
                <img 
                    src="{{ asset($achievement->image_path) }}" 
                    alt="{{ $achievement->name }}" 
                    class="w-16 h-16 rounded-lg mb-2 transition-all"
                >
                <span class="text-sm font-semibold text-center">
                    {{ $achievement->name }}
                </span>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500">No recent achievements unlocked.</p>
        @endforelse
    </div>
</div>

    {{--  Categories --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        @foreach ($categories as $category)
            @php
                $total = $category->items->count();
                $done = $category->items->where('is_completed', true)->count();
                $percent = $total > 0 ? round(($done / $total) * 100) : 0;
            @endphp

            <div class="bg-gray-800 p-5 rounded-xl shadow">
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
        <h2 class="text-xl font-bold mb-3"> Active Goals</h2>

            @if($activeItems->isEmpty())
                <p class="text-gray-500">All tasks completed 🎉</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                    @foreach ($activeItems as $item)
                        <div class="bg-gray-800 p-2 rounded shadow text-sm">
                            <div class="font-medium truncate">{{ $item->title }}</div>
                            <div class="text-xs text-gray-400 mt-1">{{ $item->category->name ?? '' }}</div>
                        </div>
                    @endforeach
                </div>
            @endif
    </div>

    {{--  Recently Completed --}}
    <div>
        <h2 class="text-xl font-bold mb-3"> Recently Completed</h2>

            @if($recentCompleted->isEmpty())
                <p class="text-gray-500">No completed items yet</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                    @foreach ($recentCompleted as $item)
                        <div class="bg-gray-800 p-2 rounded shadow text-sm">
                            <div class="font-medium truncate">{{ $item->title }}</div>
                            <div class="text-xs text-gray-400 mt-1">Completed</div>
                        </div>
                    @endforeach
                </div>
            @endif
    </div>

    </div>


</x-app-layout>