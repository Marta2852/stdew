<x-app-layout>
    <div class="max-w-3xl mx-auto p-6">

        <h1 class="text-2xl font-bold mb-6">
            {{ $category->name }}
        </h1>

        @foreach ($category->items as $item)
            <div class="bg-gray-800 p-3 rounded shadow mb-2">
                <form method="POST"
                      action="{{ route('items.toggle', $item) }}"
                      class="flex items-center gap-3">
                    @csrf
                    @method('PATCH')

                    <input type="checkbox"
                           onchange="this.form.submit()"
                           {{ $item->is_completed ? 'checked' : '' }}>

                    <div id="display-{{ $item->id }}" class="ml-3">
                        <span>{{ $item->title }}</span>
                    </div>

                    <div id="edit-{{ $item->id }}" class="ml-3 hidden w-full">
                        <form method="POST" action="{{ route('items.update', $item) }}" class="flex w-full gap-2">
                            @csrf
                            @method('PUT')
                            <input type="text" name="title" value="{{ $item->title }}" class="border rounded px-2 py-1 w-full" required>
                            <button class="bg-green-600 text-white px-3 py-1 rounded">Save</button>
                            <button type="button" onclick="cancelEdit({{ $item->id }})" class="text-gray-600 px-2">Cancel</button>
                        </form>
                    </div>

                    <div class="ml-auto">
                        <button type="button" onclick="showEdit({{ $item->id }})" class="text-sm text-blue-600">Edit</button>
                    </div>
                </form>
            </div>
        @endforeach

        <script>
            function showEdit(id) {
                document.getElementById('display-' + id).classList.add('hidden');
                document.getElementById('edit-' + id).classList.remove('hidden');
            }

            function cancelEdit(id) {
                document.getElementById('edit-' + id).classList.add('hidden');
                document.getElementById('display-' + id).classList.remove('hidden');
            }
        </script>

    </div>
</x-app-layout>