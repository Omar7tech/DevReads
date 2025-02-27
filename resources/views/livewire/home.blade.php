<div class="p-5 md:p-0">

    <div id="search_area" class="py-20">
        <div class="max-w-md mx-auto">
            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input wire:model.live="search" type="search" id="default-search"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search Mockups, Logos..." required />
            </div>
        </div>
    </div>


    <div class="text-white bg-gray-900 min-h-screen p-5">
        @if (!$categories->isEmpty())
            <div class="mx-2 mt-10 text-center">
                {{ $categories->links() }}
            </div>

            @foreach ($categories as $category)
                <div class="mt-10">
                    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                    <div class="flex justify-between">
                        <h2 class="ms-5 text-2xl font-bold mb-4 text-gray-100">
                            {{ $category->name }} <span class="text-sm">( {{ $category->books_count }} )</span>
                        </h2>
                        <button
                            class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                            <a href="{{ route('books.category', [$category]) }}"
                                class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-transparent group-hover:dark:bg-transparent">
                                Show More
                            </a>
                        </button>
                    </div>

                    <!-- Books Scrollable Container -->
                    <div class="relative">
                        <div class="flex overflow-x-auto space-x-4 p-4 scrollbar-hide scroll-auto">
                            @forelse ($category->books as $book)
                                <x-cards.main :$book />
                            @empty
                                <p class="text-gray-400 text-lg">No books available in this category.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Pagination -->
            <div class="mx-2 mt-10 text-center">
                {{ $categories->links() }}
            </div>
        @elseif(count($books) > 0)
            @php
                $haveBook = true;
            @endphp
            <div class="flex flex-wrap gap-4 justify-center">
                @foreach ($books as $book)
                    <x-cards.main :$book :$haveBook />
                @endforeach
            </div>
        @else
            <div class="flex items-center justify-center min-h-[50vh]">
                <p class="text-gray-400 text-lg">No Books Available.</p>
            </div>
        @endif
    </div>
</div>
