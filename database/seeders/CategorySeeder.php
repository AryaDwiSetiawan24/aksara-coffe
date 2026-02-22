<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Coffee', 'slug' => 'coffee', 'order' => 1],
            ['name' => 'Non-Coffee', 'slug' => 'non-coffee', 'order' => 2],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
