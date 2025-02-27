@props([
    'categories' => [],
    'ordering' => false,
    'search' => '',
    'showHaveBooks' => false,
    'editingCategorySlug' => null,
    'editingCategoryName' => '',
    'editingCategorySlugValue' => '',
])

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <caption
            class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            <div class="flex justify-between">

                <div class="flex justify-start items-center space-x-3">
                    <h1>
                        {{ !$editingCategorySlug ? 'Categories' : 'Editing' }}
                    </h1>

                    <div wire:loading role="status">
                        <svg aria-hidden="true"
                            class="w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="currentColor" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentFill" />
                        </svg>
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    @if (!$editingCategorySlug)
                        <!-- Search Input -->
                        <div class="relative w-full max-w-xs">
                            <input wire:model.live='search' type="text" id="small-input"
                                placeholder="Search Categories"
                                class="block w-full p-2 pl-10 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm
                                focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <!-- Search Icon -->
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-500 dark:text-gray-400"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 1 1 0 8 4 4 0 0 1 0-8ZM2 8a6 6 0 1 1 10.743 3.53l3.593 3.593a1 1 0 0 1-1.415 1.414l-3.592-3.592A6 6 0 0 1 2 8Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    @endif
                </div>

            </div>

            <div class="mt-3">
                <div wire:ignore x-data="{ isEditing: @entangle('editingCategorySlug') }" x-show="!isEditing">
                    <x-tables.categories.settings>
                        <div class="flex items-center mb-4">
                            <input wire:model.lazy='ordering' id="ordering-checkbox" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="ordering-checkbox"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                Enable Sorting Mode (Show All)
                            </label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input wire:model.lazy='showHaveBooks' id="ordering-checkbox" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="ordering-checkbox"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                Show Categories That Have Books
                            </label>
                        </div>
                    </x-tables.categories.settings>
                </div>


                @if ($showHaveBooks && $ordering)
                    <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                        role="alert">
                        <span class="font-medium">Info alert!</span> In This Way The User Will See The Category.
                    </div>
                @endif

            </div>




        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                @if ($ordering)
                    <th scope="col" class="px-6 py-3">
                        Order
                    </th>
                @endif



                <th scope="col" class="px-6 py-3">
                    Enabled
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Slug
                </th>
                <th scope="col" class="px-6 py-3">
                    Books
                </th>

                <th scope="col" class="px-6 py-3">
                    Created At
                </th>
                <th scope="col" class="px-6 py-3">
                    Updated At
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody wire:sortable="updateCategoriesPosition">
            @foreach ($categories as $category)
                <tr @if ($ordering) wire:sortable.item="{{ $category->slug }}" wire:key="{{ $category->slug }}" @endif
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    @if ($ordering)
                        <td wire:sortable.handle scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white cursor-move">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M18 6H6m12 4H6m12 4H6m12 4H6" />
                            </svg>
                        </td>
                    @endif

                    {{-- Display Edit Form if Editing --}}
                    @if ($editingCategorySlug === $category->slug)
                    <td class="px-6 py-4">
                        <div class="flex items-center me-4">
                            <input wire:click='updateCategoryEnabled("{{ $category->slug }}")'
                                @if ($category->enabled) checked @endif id="green-checkbox" type="checkbox"
                                value=""
                                class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        </div>
                    </td>
                        <td class="px-6 py-4">
                            <input wire:model="editingCategoryName" type="text"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </td>
                        <td class="px-6 py-4">{{ $category->slug }}</td>
                        <td class="px-6 py-4">
                            @php
                                $count = $category->books->count();
                            @endphp
                            @if ($count == 0)
                                <span
                                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">{{ $count }}</span>
                            @else
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">{{ $count }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">{{ $category->created_at }}</td>
                        <td class="px-6 py-4">{{ $category->updated_at }}</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button wire:click="saveCategory" type="button"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-800">
                                Save
                            </button>
                            <button wire:click="cancelEdit" type="button"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
                                Cancel
                            </button>
                        </td>
                    @else
                        {{-- Display Regular Row Content --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center me-4">
                                <input wire:click='updateCategoryEnabled("{{ $category->slug }}")'
                                    @if ($category->enabled) checked @endif id="green-checkbox" type="checkbox"
                                    value=""
                                    class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            </div>
                        </td>
                        <td class="px-6 py-4">{{ $category->name }}</td>
                        <td class="px-6 py-4">{{ $category->slug }}</td>
                        <td class="px-6 py-4">
                            @php
                                $count = $category->books->count();
                            @endphp
                            @if ($count == 0)
                                <span
                                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">{{ $count }}</span>
                            @else
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">{{ $count }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">{{ $category->created_at }}</td>
                        <td class="px-6 py-4">{{ $category->updated_at }}</td>
                        <td class="px-6 py-4 text-right">
                            <button wire:click="editCategory('{{ $category->slug }}')" type="button"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                </svg>
                                Edit
                            </button>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>


</div>
