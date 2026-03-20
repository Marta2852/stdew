<x-app-layout>
    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Achievements</h1>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
            @forelse($achievements as $achievement)
                <form method="POST" action="{{ route('achievements.toggle', $achievement) }}">
                    @csrf
                    @method('PATCH')
                    <button type="submit" 
                            class="flex flex-col items-center bg-gray-800 rounded-xl shadow p-3 hover:shadow-lg transition w-28">
                        <div class="relative">
                            {{-- Achievement Image --}}
                            <img 
                                src="{{ $achievement->image_url }}" 
                                alt="{{ $achievement->name }}" 
                                class="w-20 h-20 rounded-lg mb-2 transition-all
                                    @if(!$achievement->is_unlocked) opacity-60 grayscale @endif"
                            >

                            {{-- Checkmark if unlocked --}}
                            @if($achievement->is_unlocked)
                                <span class="absolute top-0 right-0 bg-green-500 text-white text-xs px-1 rounded">✓</span>
                            @endif
                        </div>

                        {{-- Achievement Name --}}
                        <span class="text-xs font-semibold text-center mb-1">
                            {{ $achievement->name }}
                        </span>

                        {{-- Achievement Description --}}
                        <span class="text-[10px] text-gray-400 text-center">
                            {{ $achievement->description }}
                        </span>
                    </button>
                </form>
            @empty
                <p class="text-gray-500 col-span-full text-center">No achievements yet.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>