<div id="accordion-arrow-icon" data-accordion="open">
    <h2 id="accordion-arrow-icon-heading-3">
        <button type="button"
            class="flex items-center justify-between w-full p-2 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
            data-accordion-target="#accordion-arrow-icon-body-3" aria-expanded="false"
            aria-controls="accordion-arrow-icon-body-3">
            <span>Settings</span>
            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5 5 1 1 5" />
            </svg>
        </button>
    </h2>
    <div id="accordion-arrow-icon-body-3" class="hidden" aria-labelledby="accordion-arrow-icon-heading-3">
        <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
           {{ $slot }}
        </div>
    </div>
</div>
