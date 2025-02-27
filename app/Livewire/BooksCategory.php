<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class BooksCategory extends Component
{

    public Category $category;

    
    public function render()
    {
        $category = Category::with("books")->get();
        return view('livewire.books-category' , compact("category"));
    }
}
