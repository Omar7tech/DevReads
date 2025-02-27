@props(['book' => ['name' => 'no name', 'description' => 'no description', 'category' => ['name' => 'no category']]])

<div class="w-40 flex-shrink-0 rounded-lg overflow-hidden shadow-lg bg-white dark:bg-gray-800 snap-start flex flex-col">
    <!-- PDF Icon or Thumbnail -->
    <div class="w-full h-24 bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
        <svg class="w-8 h-8 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7Z" clip-rule="evenodd"/>
        </svg>
    </div>

    <!-- Book Name and Category -->
    <div class="p-2 flex-grow">
        <h2 class="text-sm font-semibold text-gray-900 dark:text-gray-100 truncate">{{ $book->name }}</h2>
        <!-- Category Badge -->
        <span class="bg-blue-100 text-blue-800 text-xs font-medium mt-1 px-2 py-0.5 rounded-sm dark:bg-blue-900 dark:text-blue-300 inline-block">
            {{ $book->category->name }}
        </span>
    </div>

    <!-- Action Buttons -->
    <div class="p-2 flex justify-between items-center space-x-2">
        <!-- View Button -->
        <button type="button" class="p-1 text-gray-500 dark:text-gray-400 hover:text-blue-500 dark:hover:text-blue-400">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
            </svg>
        </button>

        <!-- Download Button -->
        <button type="button" class="p-1 text-gray-500 dark:text-gray-400 hover:text-blue-500 dark:hover:text-blue-400">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z" clip-rule="evenodd"/>
                <path fill-rule="evenodd" d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z" clip-rule="evenodd"/>
            </svg>
        </button>
    </div>
</div>
