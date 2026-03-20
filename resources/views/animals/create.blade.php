<x-app-layout>
    <div class="max-w-2xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Add New Animal</h1>

        <form action="{{ route('animals.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block font-medium">Type</label>
                <select name="type" class="w-full rounded border-gray-300 p-2" required>
                    <option value="coop">Coop</option>
                    <option value="barn">Barn</option>
                </select>
            </div>

            <div>
                <label class="block font-medium">Species</label>
                <select name="species" class="w-full rounded border-gray-300 p-2" required>
                    <option value="White Chicken">White Chicken</option>
                    <option value="Brown Chicken">Brown Chicken</option>
                    <option value="Blue Chicken">Blue Chicken</option>
                    <option value="Void Chicken">Void Chicken</option>
                    <option value="Duck">Duck</option>
                    <option value="Rabbit">Rabbit</option>
                    <option value="Dinosaur">Dinosaur</option>
                    <option value="White Cow">White Cow</option>
                    <option value="Brown Cow">Brown Cow</option>
                    <option value="Goat">Goat</option>
                    <option value="Sheep">Sheep</option>
                    <option value="Pig">Pig</option>
                    <option value="Ostrich">Ostrich</option>
                </select>
            </div>

            <div>
                <label class="block font-medium">Name</label>
                <input type="text" name="name" class="w-full rounded border-gray-300 p-2" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Animal</button>
        </form>
    </div>
</x-app-layout>