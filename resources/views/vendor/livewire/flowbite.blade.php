<div>
    @if ($items->hasPages())
        <nav class="flex items-center justify-between">
            {{-- Mobile Pagination --}}
            <div class="flex justify-between flex-1 sm:hidden">
                <span>
                    @if ($items->onFirstPage())
                        <span class="px-4 py-2 text-gray-500 bg-gray-200 rounded-md cursor-default">
                            {!! __('Previous') !!}
                        </span>
                    @else
                        <button wire:click="previousPage"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            {!! __('Previous') !!}
                        </button>
                    @endif
                </span>

                <span>
                    @if ($items->hasMorePages())
                        <button wire:click="nextPage"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            {!! __('Next') !!}
                        </button>
                    @else
                        <span class="px-4 py-2 text-gray-500 bg-gray-200 rounded-md cursor-default">
                            {!! __('Next') !!}
                        </span>
                    @endif
                </span>
            </div>

            {{-- Desktop Pagination --}}
            <div class="hidden sm:flex sm:items-center sm:justify-between w-full">
                <p class="text-gray-700 dark:text-gray-300">
                    {!! __('Showing') !!}
                    <span class="font-medium">{{ $items->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="font-medium">{{ $items->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="font-medium">{{ $items->total() }}</span>
                    {!! __('results') !!}
                </p>

                <ul class="inline-flex items-center space-x-2">
                    {{-- Previous Page --}}
                    @if ($items->onFirstPage())
                        <li class="px-3 py-2 text-gray-400 bg-gray-200 rounded-lg cursor-not-allowed">
                            &laquo;
                        </li>
                    @else
                        <li>
                            <button wire:click="previousPage"
                                class="px-3 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                &laquo;
                            </button>
                        </li>
                    @endif

                    {{-- Page Numbers --}}
                    @foreach ($items->links()->elements[0] as $page => $url)
                        @if ($page == $items->currentPage())
                            <li class="px-3 py-2 bg-blue-500 text-white rounded-lg">
                                {{ $page }}
                            </li>
                        @else
                            <li>
                                <button wire:click="gotoPage({{ $page }})"
                                    class="px-3 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">
                                    {{ $page }}
                                </button>
                            </li>
                        @endif
                    @endforeach

                    {{-- Next Page --}}
                    @if ($items->hasMorePages())
                        <li>
                            <button wire:click="nextPage"
                                class="px-3 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                &raquo;
                            </button>
                        </li>
                    @else
                        <li class="px-3 py-2 text-gray-400 bg-gray-200 rounded-lg cursor-not-allowed">
                            &raquo;
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    @endif
</div>
