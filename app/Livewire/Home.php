<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use Storage;

class Home extends Component
{
    use WithPagination;

    #[Url]
    public $search = '';
    public function render()
    {
        $categories = Category::withCount('books') // This will get the total count of books
            ->with([
                'books' => function ($query) {
                    $query->limit(10); // Limit the number of books loaded to 10
                }
            ])
            ->has('books')
            ->where('name', 'like', "%$this->search%")
            ->orderByDesc('books_count')
            ->paginate(5);

        $books = [];

        if (!empty($this->search)) {
            $books = Book::where("name", "like", "%$this->search%")->limit(10)->get();
        }
        return view('livewire.home', compact("categories", "books"));
    }

    public function download($slug)
    {
        
        $book = Book::where('slug', $slug)->firstOrFail();
        if (!Storage::disk('public')->exists($book->pdf_path)) {
            abort(404,  "File not found.");
        }
    
        $book->increment('downloads'); 
    
        return Storage::disk('public')->download($book->pdf_path, "{$slug}.pdf");
    }
    
}
