@props(['isActive' => false, 'url' => '#' , "label" => "homee"])

<li>
    <a wire:navigate href="{{ $url }}"
        @class([
            'block py-2 px-3 rounded-sm md:p-0',
            'text-white bg-blue-700 md:bg-transparent md:text-blue-700 dark:bg-blue-600 md:dark:bg-transparent md:dark:text-blue-500' => $isActive,
            'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent' => !$isActive,
        ])
        aria-current="{{ $isActive ? 'page' : 'false' }}">
        {{ $label }}
    </a>
</li>
