@php
if (!isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
            {{-- Mobile Pagination --}}
            <div class="flex justify-between flex-1 sm:hidden">
                <span>
                    @if ($paginator->onFirstPage())
                        <span class="px-4 py-2 text-sm font-medium text-gray-500 bg-gray-100 border border-gray-300 rounded-md cursor-not-allowed dark:bg-gray-700 dark:text-gray-400">
                            {!! __('pagination.previous') !!}
                        </span>
                    @else
                        <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-400">
                            {!! __('pagination.previous') !!}
                        </button>
                    @endif
                </span>

                <span>
                    @if ($paginator->hasMorePages())
                        <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" class="px-4 py-2 ml-3 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-400">
                            {!! __('pagination.next') !!}
                        </button>
                    @else
                        <span class="px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-gray-100 border border-gray-300 rounded-md cursor-not-allowed dark:bg-gray-700 dark:text-gray-400">
                            {!! __('pagination.next') !!}
                        </span>
                    @endif
                </span>
            </div>

            {{-- Desktop Pagination --}}
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {!! __('Showing') !!}
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>

                <div class="inline-flex items-center space-x-2">
                    @if ($paginator->onFirstPage())
                        <span class="px-3 py-2 text-sm text-gray-500 bg-gray-100 border border-gray-300 rounded-md cursor-not-allowed dark:bg-gray-700 dark:text-gray-400">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    @else
                        <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" class="px-3 py-2 text-sm text-white bg-blue-600 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-400">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    @endif

                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <span class="px-3 py-2 text-sm text-gray-500 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-400">
                                {{ $element }}
                            </span>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                <span wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
                                    @if ($page == $paginator->currentPage())
                                        <span class="px-3 py-2 text-sm font-medium text-white bg-blue-600 rounded-md">
                                            {{ $page }}
                                        </span>
                                    @else
                                        <button type="button" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" class="px-3 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700">
                                            {{ $page }}
                                        </button>
                                    @endif
                                </span>
                            @endforeach
                        @endif
                    @endforeach

                    @if ($paginator->hasMorePages())
                        <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" class="px-3 py-2 text-sm text-white bg-blue-600 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-400">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    @else
                        <span class="px-3 py-2 text-sm text-gray-500 bg-gray-100 border border-gray-300 rounded-md cursor-not-allowed dark:bg-gray-700 dark:text-gray-400">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    @endif
                </div>
            </div>
        </nav>
    @endif
</div>
