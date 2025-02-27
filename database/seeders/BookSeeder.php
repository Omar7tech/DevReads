<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::inRandomOrder()->limit(10)->pluck('id');

        // Create 15 books for each category (total 150 books)
        foreach ($categories as $categoryId) {
            Book::factory(rand(5 , 20))->create([
                'category_id' => $categoryId,
            ]);
        }
    }
}