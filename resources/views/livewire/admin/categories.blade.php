<div>

    <x-tables.categories.main :$categories :$ordering :$search :$showHaveBooks :$editingCategorySlug :$editingCategoryName  />

    @if (!$ordering && $categories->hasPages())
        <div class="px-5 mt-2 p-2 bg-gray-800 rounded-md">
            {{ $categories->links(data: ['scrollTo' => false]) }}
        </div>
    @endif



</div>
