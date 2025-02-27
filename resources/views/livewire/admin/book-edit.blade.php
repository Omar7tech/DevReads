<div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-sm">
    <form wire:submit.prevent="save" class="space-y-6">
        <!-- Category -->
        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category</label>
            <select wire:model="category_id" id="category_id" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 transition duration-200">
                <option value="" class="text-gray-400">Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $category_id ? 'selected' : '' }} class="text-gray-900 dark:text-gray-100">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <span class="text-sm text-red-600 dark:text-red-400 mt-1 block">{{ $message }}</span> @enderror
        </div>

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Name</label>
            <input wire:model="name" type="text" id="name" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 transition duration-200">
            @error('name') <span class="text-sm text-red-600 dark:text-red-400 mt-1 block">{{ $message }}</span> @enderror
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
            <textarea wire:model="description" id="description" rows="4" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 transition duration-200"></textarea>
            @error('description') <span class="text-sm text-red-600 dark:text-red-400 mt-1 block">{{ $message }}</span> @enderror
        </div>

        <!-- Cover Photo -->
        <div>
            <label for="new_cover_photo" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Cover Photo</label>
            <input wire:model="new_cover_photo" type="file" id="new_cover_photo" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 transition duration-200">
            @error('new_cover_photo') <span class="text-sm text-red-600 dark:text-red-400 mt-1 block">{{ $message }}</span> @enderror
            @if($cover_photo)
                <div class="mt-4">
                    <img src="{{ asset('storage/' . $cover_photo) }}" alt="Current Cover" class="w-32 h-32 object-cover rounded-lg shadow-sm">
                </div>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-200">
                Save Changes
            </button>
        </div>
    </form>
</div>
