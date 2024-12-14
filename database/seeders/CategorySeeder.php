<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            ['name' => 'Daily Life'],
            ['name' => 'Thoughts'],
            ['name' => 'Life Experiences'],
            ['name' => 'Travel'],
            ['name' => 'Creativity and Hobbies'],
            ['name' => 'Inspiration and Motivation'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
