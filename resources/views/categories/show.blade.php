<x-app-layout>
    <div class="max-w-3xl mx-auto p-6">

        <h1 class="text-2xl font-bold mb-6">
            {{ $category->name }}
        </h1>

        @foreach ($category->items as $item)
            <form method="POST"
                  action="{{ route('items.toggle', $item) }}"
                  class="flex items-center gap-3 bg-white p-3 rounded shadow mb-2">
                @csrf
                @method('PATCH')

                <input type="checkbox"
                       onchange="this.form.submit()"
                       {{ $item->is_completed ? 'checked' : '' }}>

                <span>{{ $item->title }}</span>

                <a href="{{ route('items.edit', $item) }}"
                   class="text-sm text-blue-600 ml-auto">
                    Edit
                </a>
            </form>
        @endforeach

    </div>
</x-app-layout>