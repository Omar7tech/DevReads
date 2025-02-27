<div class="mt-10">
    

    <div class="flex justify-center content-center">
        <h2 class="text-center text-4xl font-extrabold dark:text-white mb-10">{{ $category->name }}</h2>
    </div>

    <div class="flex flex-wrap gap-4 justify-center px-5">
        @foreach ($category->books as $book)
            <x-cards.main :$book />
        @endforeach
    </div>

    {{-- <div class="mt-10">
        {{ $category->links() }}
    </div> --}}
</div>
