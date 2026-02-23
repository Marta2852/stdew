<x-app-layout>
    <div class="max-w-md mx-auto p-6">

        <h1 class="text-2xl font-bold mb-6"> Add Checklist Item</h1>

        <form method="POST" action="{{ route('items.store') }}">
            @csrf

            <input type="text"
                   name="title"
                   placeholder="e.g. Catch Legend Fish"
                   class="w-full p-2 border rounded mb-4"
                   required>

            <select name="category_id"
                    class="w-full p-2 border rounded mb-4"
                    required>
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <button class="bg-green-600 text-white px-4 py-2 rounded">
                Create Item
            </button>
        </form>

    </div>
</x-app-layout>