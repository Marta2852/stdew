<x-app-layout>
    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Animals</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Coop Animals --}}
            <div>
                <h2 class="text-xl font-semibold mb-2">Coop Animals</h2>
                <a href="{{ route('animals.create') }}" class="text-sm text-blue-500 mb-2 inline-block">+ Add</a>
                <div class="grid grid-cols-2 gap-4">
                    @forelse($coopAnimals as $animal)
                        <div class="flex flex-col items-center bg-gray-800 rounded-xl shadow p-3">
                            <img src="{{ $animal->image_url }}" alt="{{ $animal->name }}" class="w-16 h-16 rounded-lg mb-2">
                            <span class="text-sm text-center">{{ $animal->name }}</span>
                        </div>
                    @empty
                        <p class="text-gray-500 col-span-full">No coop animals yet.</p>
                    @endforelse
                </div>
            </div>

            {{-- Barn Animals --}}
            <div>
                <h2 class="text-xl font-semibold mb-2">Barn Animals</h2>
                <a href="{{ route('animals.create') }}" class="text-sm text-blue-500 mb-2 inline-block">+ Add</a>
                <div class="grid grid-cols-2 gap-4">
                    @forelse($barnAnimals as $animal)
                        <div class="flex flex-col items-center bg-gray-800 rounded-xl shadow p-3">
                            <img src="{{ $animal->image_url }}" alt="{{ $animal->name }}" class="w-16 h-16 rounded-lg mb-2">
                            <span class="text-sm text-center">{{ $animal->name }}</span>
                        </div>
                    @empty
                        <p class="text-gray-500 col-span-full">No barn animals yet.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>