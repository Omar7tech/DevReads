<div class="bg-gray-900 text-white min-h-screen p-6">
    <form wire:submit.prevent="save" class="space-y-4 max-w-2xl mx-auto">
        <!-- Category -->
        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-300">Category</label>
            <select wire:model="category_id" id="category_id" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <option value="" class="text-gray-400">Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" class="text-white">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <span class="text-sm text-red-400">{{ $message }}</span> @enderror
        </div>

        

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-300">Name</label>
            <input wire:model="name" type="text" id="name" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            @error('name') <span class="text-sm text-red-400">{{ $message }}</span> @enderror
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-300">Description</label>
            <textarea wire:model="description" id="description" rows="3" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
            @error('description') <span class="text-sm text-red-400">{{ $message }}</span> @enderror
        </div>

        <!-- PDF File -->
        <div>
            <label for="pdf_path" class="block text-sm font-medium text-gray-300">PDF File</label>
            <input wire:model="pdf_path" type="file" id="pdf_path" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            @error('pdf_path') <span class="text-sm text-red-400">{{ $message }}</span> @enderror
        </div>

        <!-- Cover Photo -->
        <div>
            <label for="cover_photo" class="block text-sm font-medium text-gray-300">Cover Photo</label>
            <input wire:model="cover_photo" type="file" id="cover_photo" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            @error('cover_photo') <span class="text-sm text-red-400">{{ $message }}</span> @enderror
        </div>



        <!-- Submit Button -->
        <div>
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </div>
    </form>
</div>
