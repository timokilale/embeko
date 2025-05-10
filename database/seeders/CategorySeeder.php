<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'News',
                'description' => 'Latest news and updates from Embeko Secondary School',
            ],
            [
                'name' => 'Academics',
                'description' => 'Information about academic programs, curriculum, and educational resources',
            ],
            [
                'name' => 'Events',
                'description' => 'School events, celebrations, and activities',
            ],
            [
                'name' => 'Sports',
                'description' => 'Sports news, tournaments, and achievements',
            ],
            [
                'name' => 'Announcements',
                'description' => 'Important announcements and notices for students, parents, and staff',
            ],
        ];

        foreach ($categories as $category) {
            // Check if category already exists
            if (!Category::where('name', $category['name'])->exists()) {
                Category::create([
                    'name' => $category['name'],
                    'slug' => Str::slug($category['name']),
                    'description' => $category['description'],
                ]);
            }
        }
    }
}
