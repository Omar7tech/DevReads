<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Book;
use App\Models\Category;
use Livewire\Attributes\Layout;

class BookCreate extends Component
{
    use WithFileUploads;

    #[Layout('components.layouts.admin')]

    public $category_id;

    public $name;
    public $description;
    public $pdf_path;
    public $cover_photo;
    public $file_size;

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.book-create', compact('categories'));
    }

    public function save()
    {
        $this->validate([
            'category_id' => 'required|exists:categories,id',
          
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'pdf_path' => 'required|file|mimes:pdf|max:10240', // 10MB Max
            'cover_photo' => 'nullable|image|max:2048', // 2MB Max
        ]);

        $pdfPath = $this->pdf_path->store('pdfs', 'public');
        $coverPhotoPath = $this->cover_photo ? $this->cover_photo->store('covers', 'public') : null;

        Book::create([
            'category_id' => $this->category_id,

            'name' => $this->name,
            'description' => $this->description,
            'pdf_path' => $pdfPath,
            'cover_photo' => $coverPhotoPath,
            'file_size' => $this->pdf_path->getSize(),
        ]);

        session()->flash('message', 'Book created successfully.');

        return redirect()->route('books.index');
    }
}
