<x-app-layout>
    <div class="max-w-md mx-auto p-6">

        <h1 class="text-2xl font-bold mb-6"> Edit Item</h1>

        <form method="POST" action="{{ route('items.update', $item) }}">
            @csrf
            @method('PUT')

            <input type="text"
                   name="title"
                   value="{{ $item->title }}"
                   class="w-full p-2 border rounded mb-4"
                   required>

            <button class="bg-green-600 text-white px-4 py-2 rounded">
                Update
            </button>
        </form>

        <form method="POST"
              action="{{ route('items.destroy', $item) }}"
              class="mt-4">
            @csrf
            @method('DELETE')

            <button class="text-red-600">
                🗑 Delete Item
            </button>
        </form>

    </div>
</x-app-layout>