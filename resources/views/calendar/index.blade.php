<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        
        {{-- Header Section --}}
        <div class="mb-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                <h1 class="text-4xl font-bold mb-1 capitalize text-white">{{ $season }} Tracker</h1>
                <p class="text-gray-400 text-sm italic">Stardew Valley Seasonal Guide</p>
            </div>
            
            <div class="flex gap-1 bg-gray-800 p-1 rounded-xl border border-gray-700 shadow-lg">
                @foreach(['spring', 'summer', 'fall', 'winter'] as $s)
                    <a href="{{ route('calendar.index', $s) }}"
                       class="px-4 py-2 rounded-lg text-xs font-black transition-all uppercase tracking-widest
                            @if(strtolower($season) === $s)
                                bg-amber-600 text-white shadow-md
                            @else
                                text-gray-500 hover:text-white hover:bg-gray-700
                            @endif">
                        {{ $s }}
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Main 2x2 Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
            {{-- TOP LEFT: BIRTHDAYS --}}
            <div class="bg-gray-800/40 backdrop-blur-md rounded-3xl p-6 border border-gray-700 shadow-xl flex flex-col">
                <div class="flex items-center gap-3 mb-6">
                    <span class="p-2 bg-pink-500/20 rounded-lg text-xl">🎂</span>
                    <h2 class="text-xl font-bold text-white">Birthdays</h2>
                </div>

                <div class="grid grid-cols-2 gap-3 overflow-y-auto max-h-[400px] pr-2 custom-scrollbar">
                    @forelse($birthdays as $birthday)
                        <div class="flex items-center gap-3 bg-gray-900/60 p-2 rounded-2xl border border-gray-700/50">
                            <div class="relative flex-shrink-0">
                                <img src="{{ asset('portraits/' . ($birthday->image_path ?? 'default.png')) }}" 
                                     class="w-10 h-10 rounded-lg object-cover border border-gray-600">
                                
                            </div>
                            <div class="overflow-hidden">
                                <p class="font-bold text-gray-100 text-xs truncate">{{ $birthday->name }}</p>
                                <p class="text-[10px] text-gray-500 uppercase">Day {{ $birthday->day }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500 text-xs italic col-span-2 text-center py-10">No birthdays recorded.</p>
                    @endforelse
                </div>
            </div>

            {{-- TOP RIGHT: CALENDAR IMAGE --}}
            <div class="bg-gray-800 rounded-3xl overflow-hidden border border-gray-700 shadow-xl flex items-center justify-center bg-gray-900/20">
                @php $imgPath = 'calender/Calendar_' . ucfirst($season) . '.png'; @endphp
                @if(file_exists(public_path($imgPath)))
                    <img src="{{ asset($imgPath) }}"
                         alt="{{ $season }} calendar"
                         class="w-full h-full object-contain p-2 hover:scale-105 transition-transform duration-500">
                @else
                    <div class="p-10 text-center">
                        <p class="text-gray-600 text-xs italic font-mono">Map Asset Missing: {{ $imgPath }}</p>
                    </div>
                @endif
            </div>

            {{-- BOTTOM LEFT: CROPS --}}
            <div class="bg-gray-800/40 backdrop-blur-md rounded-3xl p-6 border border-gray-700 shadow-xl">
                <div class="flex items-center gap-3 mb-6">
                    <span class="p-2 bg-green-500/20 rounded-lg text-xl">🌱</span>
                    <h2 class="text-xl font-bold text-white">Last Day to Plant</h2>
                </div>
                <div class="grid grid-cols-3 sm:grid-cols-4 gap-3">
                    @foreach($crops as $crop)
                        <div class="bg-gray-900/60 p-2 rounded-xl border border-gray-700 flex flex-col items-center group">
                            <img src="{{ asset('crops/' . ($crop->image_path ?? 'default.png')) }}" 
                                 class="w-8 h-8 object-contain mb-1 group-hover:scale-110 transition-transform">
                            <p class="text-[10px] font-bold text-gray-200 text-center truncate w-full">{{ $crop->name }}</p>
                            <p class="text-[9px] text-green-400 font-black bg-green-900/30 px-1.5 rounded mt-1">
                                Day {{ 28 - $crop->growth_time }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- BOTTOM RIGHT: EVENTS --}}
            <div class="bg-gray-800/40 backdrop-blur-md rounded-3xl p-6 border border-gray-700 shadow-xl">
                <div class="flex items-center gap-3 mb-6">
                    <span class="p-2 bg-blue-500/20 rounded-lg text-xl">🌼</span>
                    <h2 class="text-xl font-bold text-white">Festivals</h2>
                </div>
                <div class="space-y-2">
                    @forelse($eventRanges as $event)
                        <div class="flex items-center justify-between bg-gray-900/60 p-3 rounded-xl border border-gray-700/50">
                            <div class="flex items-center gap-3">
                                <p class="font-bold text-gray-100 text-xs">{{ $event->name }}</p>
                            </div>
                            <span class="text-blue-400 font-bold text-[10px] bg-blue-400/10 px-2 py-0.5 rounded border border-blue-400/20">Day {{ $event->day_range }}</span>
                        </div>
                    @empty
                        <p class="text-gray-500 text-xs italic text-center py-6">No major festivals.</p>
                    @endforelse
                </div>
            </div>

        </div>

    
    </div>

</x-app-layout>