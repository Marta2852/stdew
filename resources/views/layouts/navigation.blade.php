<nav class="bg-white text-white px-6 py-3 flex items-center justify-between">
    {{-- Left: Brand --}}
    <a href="{{ route('dashboard') }}" class="font-bold text-lg">
        Stardew Tracker
    </a>

    {{-- Center: Links --}}
    <div class="flex gap-6">
        <a href="{{ route('dashboard') }}"
        class="{{ request()->routeIs('dashboard') ? 'underline font-semibold' : '' }}">
        Dashboard
        </a>

        <a href="{{ route('categories.index') }}"
        class="{{ request()->routeIs('categories.*') ? 'underline font-semibold' : '' }}">
            Checklist
        </a>

        <a href="{{ route('achievements.index') }}"
        class="{{ request()->routeIs('achievements.*') ? 'underline font-semibold' : '' }}">
        Achievements
        </a>

        <a href="{{ route('animals.index') }}"
        class="{{ request()->routeIs('animals.*') ? 'underline font-semibold' : '' }}">
        Animals
        </a>

        <a href="{{ route('calendar.index') }}"
        class="{{ request()->routeIs('calendar.*') ? 'underline font-semibold' : '' }}">
        Calendar
        </a>

        </div>

    {{-- Right: User --}}
    <div class="flex items-center gap-4">
        <span>{{ Auth::user()->name }}</span>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="bg-purple-600 text-white px-3 py-1 rounded">
                Logout
            </button>
        </form>
    </div>
</nav>