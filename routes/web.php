<?php

use App\Livewire\About;
use App\Livewire\Admin\BookCreate;
use App\Livewire\Admin\BookEdit;
use App\Livewire\Admin\Categories;
use App\Livewire\Admin\CategoryCreate;
use App\Livewire\Admin\CategoryEdit;
use App\Livewire\Admin\Books;
use App\Livewire\BooksCategory;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Home;
use App\Livewire\Login;
use Illuminate\Support\Facades\Route;


Route::get('/', Home::class)->name("home");
Route::get('/about', About::class)->name("about");
Route::get('/books/{category}', BooksCategory::class)->name('books.category');
Route::middleware("guest")->prefix("admin")->group(function () {
    Route::get("/login", Login::class)->name("login");
    Route::get("/dashboard", Dashboard::class)->lazy()->name("dashboard");
    Route::get("/categories", Categories::class)->name("categories.index");
    Route::get("/categories/create", CategoryCreate::class)->name("categories.create");
    Route::get("/books", Books::class)->name("books.index");
    Route::get("/books/create", BookCreate::class)->name("books.create");
    Route::get( "/books/{book}/edit", BookEdit::class)->name("books.edit");
});
