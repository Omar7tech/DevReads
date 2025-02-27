<div class="bg-white dark:bg-gray-900 p-6">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Cover
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Downloads
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <!-- Cover Image -->
                        <td class="p-4">
                            <img src="{{ $book->cover_photo ? asset('storage/' . $book->cover_photo) : 'https://via.placeholder.com/128' }}"
                                class="w-16 h-16 object-cover rounded-lg"
                                alt="{{ $book->name }}">
                        </td>

                        <!-- Title -->
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            {{ $book->name }}
                        </td>

                        <!-- Category -->
                        <td class="px-6 py-4 text-gray-900 dark:text-white">
                            {{ $book->category->name }}
                        </td>

                        <!-- Downloads -->
                        <td class="px-6 py-4 text-gray-900 dark:text-white">
                            {{ $book->downloads }}
                        </td>

                        <!-- Status -->
                        <td class="px-6 py-4">
                            <div class="cursor-pointer" wire:click='updateBookEnabled("{{ $book->slug }}")'>
                                @if($book->enabled)
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-200">
                                    Enabled
                                </span>
                            @else
                                <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-200">
                                    Disabled
                                </span>
                            @endif
                            </div>
                            
                        </td>

                        <!-- Actions -->
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <a href="{{ route('books.edit', $book) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    Edit
                                </a>
                                <form action=" {{-- {{ route('books.destroy', [$book])  }} --}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
