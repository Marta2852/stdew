<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <div class="mb-8">
            <h1 class="text-4xl font-bold mb-2 capitalize">{{ $season }} Calendar</h1>
            <p class="text-gray-400">View birthdays, events, and crops for {{ $season }}</p>
        </div>

        {{-- Season Navigation --}}
        <div class="flex gap-4 mb-8 flex-wrap">
            @foreach(['spring', 'summer', 'fall', 'winter'] as $s)
                <a href="{{ route('calendar.index', $s) }}"
                   class="px-6 py-2 rounded-lg font-semibold transition-all
                           @if(strtolower($season) === $s)
                               bg-amber-600 text-white
                           @else
                               bg-gray-700 text-gray-300 hover:bg-gray-600
                           @endif">
                    {{ ucfirst($s) }}
                </a>
            @endforeach
        </div>

        {{-- Season Image --}}
        @if(file_exists(public_path('calender/' . $season . '.png')))
            <div class="mb-8 rounded-lg overflow-hidden shadow-lg">
                <img src="{{ asset('calender/' . $season . '.png') }}" 
                     alt="{{ $season }} calendar"
                     class="w-full h-auto object-cover max-h-96">
            </div>
        @endif

        {{-- Three Column Layout --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- Birthdays --}}
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-lg shadow-lg p-6 border border-gray-700">
                <div class="flex items-center gap-3 mb-6">
                    <span class="text-3xl">🎂</span>
                    <h2 class="text-2xl font-bold">Birthdays</h2>
                </div>

                @if($birthdays->count() > 0)
                    <div class="space-y-3">
                        @foreach($birthdays as $birthday)
                            <div class="flex items-center gap-4 bg-gray-700 hover:bg-gray-600 p-3 rounded-lg transition-colors">
                                @if($birthday->image_path && file_exists(public_path('portraits/' . $birthday->image_path)))
                                    <img src="{{ asset('portraits/' . $birthday->image_path) }}" 
                                         alt="{{ $birthday->name }}"
                                         class="w-12 h-12 rounded-lg object-cover flex-shrink-0">
                                @else
                                    <div class="w-12 h-12 rounded-lg bg-gray-600 flex items-center justify-center">👤</div>
                                @endif
                                <div class="flex-1">
                                    <p class="font-semibold text-white">{{ $birthday->name }}</p>
                                    <p class="text-sm text-gray-400">Day {{ $birthday->day }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-400 text-center py-8">No birthdays this season</p>
                @endif
            </div>

            {{-- Events --}}
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-lg shadow-lg p-6 border border-gray-700">
                <div class="flex items-center gap-3 mb-6">
                    <span class="text-3xl">🌼</span>
                    <h2 class="text-2xl font-bold">Events</h2>
                </div>

                @if($events->count() > 0)
                    <div class="space-y-3">
                        @foreach($events as $event)
                            <div class="flex items-center gap-4 bg-gray-700 hover:bg-gray-600 p-3 rounded-lg transition-colors">
                                @if($event->image_path && file_exists(public_path('calender/' . $event->image_path)))
                                    <img src="{{ asset('calender/' . $event->image_path) }}" 
                                         alt="{{ $event->name }}"
                                         class="w-12 h-12 rounded-lg object-cover flex-shrink-0">
                                @else
                                    <div class="w-12 h-12 rounded-lg bg-gray-600 flex items-center justify-center">📅</div>
                                @endif
                                <div class="flex-1">
                                    <p class="font-semibold text-white">{{ $event->name }}</p>
                                    <p class="text-sm text-gray-400">Day {{ $event->day }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-400 text-center py-8">No events this season</p>
                @endif
            </div>

            {{-- Crops --}}
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-lg shadow-lg p-6 border border-gray-700">
                <div class="flex items-center gap-3 mb-6">
                    <span class="text-3xl">🌱</span>
                    <h2 class="text-2xl font-bold">Crops</h2>
                </div>

                @if($crops->count() > 0)
                    <div class="space-y-3">
                        @foreach($crops as $crop)
                            <div class="flex items-center gap-4 bg-gray-700 hover:bg-gray-600 p-3 rounded-lg transition-colors">
                                @if($crop->image_path && file_exists(public_path('crops/' . $crop->image_path)))
                                    <img src="{{ asset('crops/' . $crop->image_path) }}" 
                                         alt="{{ $crop->name }}"
                                         class="w-12 h-12 rounded-lg object-cover flex-shrink-0">
                                @else
                                    <div class="w-12 h-12 rounded-lg bg-gray-600 flex items-center justify-center">🌾</div>
                                @endif
                                <div class="flex-1">
                                    <p class="font-semibold text-white">{{ $crop->name }}</p>
                                    <p class="text-sm text-gray-400">Growth: {{ $crop->growth_time }} days</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-400 text-center py-8">No crops this season</p>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
