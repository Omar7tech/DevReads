<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;
    public $editingCategorySlug = null; // Track the slug of the category being edited
    public $editingCategoryName = ''; // Store the name of the category being edited
    public $ordering = false;

    #[Url]
    public $showHaveBooks = false;

    #[Url]
    public $search = '';

    #[Layout('components.layouts.admin')]



    public function updateCategoriesPosition($list)
    {
        foreach ($list as $item) {
            Category::findBySlug($item['value'])->update(["position" => $item['order']]);
        }
    }
    public function updateCategoryEnabled($slug)
    {
        $category = Category::findBySlug($slug);
        if (!$category) {
            return redirect()->route("categories.index");
        }
        $category->update(["enabled" => !$category->enabled]);
    }

    public function updateOrdering()
    {
        $this->ordering = !$this->ordering;
    }

    public function updatedOrdering()
    {
        $this->search = '';

    }

    public function updatedSearch()
    {
        $this->ordering = false;
    }

    #[Lazy]
    
    public function render()
    {
        $query = Category::orderBy("position");
        if (!$this->ordering && $this->search) {
            $query->where("name", "like", "%$this->search%");
        }
        if ($this->showHaveBooks) {
            $query->whereHas('books');
        }
        $categories = $this->ordering ? $query->get() : $query->paginate();
        return view('livewire.admin.categories', compact("categories"));
    }

    public function editCategory($categorySlug)
    {
        $category = Category::findBySlug($categorySlug);
        $this->editingCategorySlug = $category->slug;
        $this->editingCategoryName = $category->name;
    }

    public function saveCategory()
    {
        $category = Category::findBySlug($this->editingCategorySlug);
        $category->update([
            'name' => $this->editingCategoryName,
        ]);
        $this->cancelEdit();
    }

    public function cancelEdit()
    {
        $this->editingCategorySlug = null;
        $this->editingCategoryName = '';
    }
}
