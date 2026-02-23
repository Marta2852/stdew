<x-app-layout>
    <div class="max-w-md mx-auto p-6">

        <h1 class="text-2xl font-bold mb-6"> Add Category</h1>

        <form method="POST" action="{{ route('categories.store') }}">
            @csrf

            <input type="text"
                   name="name"
                   placeholder="e.g. Fishing, Cooking"
                   class="w-full p-2 border rounded mb-4"
                   required>

            <button class="bg-green-600 text-white px-4 py-2 rounded">
                Create Category
            </button>
        </form>

    </div>
</x-app-layout>