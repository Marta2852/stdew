<x-app-layout>
    <div class="max-w-md mx-auto p-6">

        <h1 class="text-2xl font-bold mb-6"> Edit Category</h1>

        <form method="POST" action="{{ route('categories.update', $category) }}">
            @csrf
            @method('PUT')

            <input type="text"
                   name="name"
                   value="{{ $category->name }}"
                   class="w-full p-2 border rounded mb-4"
                   required>

            <button class="bg-green-600 text-white px-4 py-2 rounded">
                Update
            </button>
        </form>

        <form method="POST"
              action="{{ route('categories.destroy', $category) }}"
              class="mt-4">
            @csrf
            @method('DELETE')

            <button class="text-red-600">
                Delete Category
            </button>
        </form>

    </div>
</x-app-layout>