<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Book;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class BookEdit extends Component
{
    use WithFileUploads;

    public Book $book;
    public $category_id;

    public $name;
    public $description;
    public $pdf_path;

    public $cover_photo;
    public $new_cover_photo;

    public function mount($book)
    {
        // Fetch the book by ID
        $this->book = $book;

        // Populate form fields with existing book data
        $this->category_id = $this->book->category_id;

        $this->name = $this->book->name;
        $this->description = $this->book->description;
        $this->pdf_path = $this->book->pdf_path;
        $this->cover_photo = $this->book->cover_photo;
    }

    public function save()
    {
        // Validate the form data
        $this->validate([
            'category_id' => 'required|exists:categories,id',

            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'new_cover_photo' => 'nullable|image|max:2048', // 2MB Max
        ]);

        // Handle cover photo upload
        if ($this->new_cover_photo) {

            Storage::disk("public")->delete($this->cover_photo);
            $this->cover_photo = $this->new_cover_photo->store('covers', 'public');
        }


        $this->book->update([
            'category_id' => $this->category_id,
            'name' => $this->name,
            'description' => $this->description,
            'cover_photo' => $this->cover_photo,
        ]);


        session()->flash('message', 'Book updated successfully.');
        return redirect()->route('books.index');
    }
    #[Layout('components.layouts.admin')]

    public function render()
    {
        $categories = \App\Models\Category::all();
        return view('livewire.admin.book-edit', compact('categories'));
    }
}
