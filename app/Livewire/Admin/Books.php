<?php

namespace App\Livewire\Admin;

use App\Models\Book;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Books extends Component
{public function updateBookEnabled($slug)
    {
        $book = Book::findBySlug($slug);
        if (!$book) {
            return redirect()->route("books.index");
        }
        $book->update(["enabled" => !$book->enabled]);
    }
    #[Layout('components.layouts.admin')]
    public function render()
    {
        $books = Book::get();
        return view('livewire.admin.books' , compact('books'));
    }
}
