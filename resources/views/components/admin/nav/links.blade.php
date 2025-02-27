<ul  class="space-y-2 font-medium">
    <x-admin.nav.link url="{{ route('dashboard') }}">
        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5" />
        </svg>
    </x-admin.nav.link>

    <x-admin.nav.dropdown.main label="Categories">
        <x-admin.nav.dropdown.link label="Show All" url="{{ route('categories.index') }}" />
        <x-admin.nav.dropdown.link label="Create" url="{{ route('categories.create') }}" />
    </x-admin.nav.dropdown.main>
    <x-admin.nav.dropdown.main label="Books">
        <x-admin.nav.dropdown.link label="Show All" url="{{ route('books.index') }}" />
        <x-admin.nav.dropdown.link label="Create" url="{{ route('books.create') }}" />
    </x-admin.nav.dropdown.main>
</ul>
