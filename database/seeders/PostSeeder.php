<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = Category::first();

        if (!$category) {
            $category = Category::create([
                'name' => 'General',
                'slug' => 'general',
                'description' => 'General news and updates',
            ]);
        }

        $posts = [
            [
                'title' => 'Welcome to Our New Website',
                'slug' => 'welcome-to-our-new-website',
                'excerpt' => 'We are excited to announce the launch of our new website.',
                'content' => '<p>We are excited to announce the launch of our new website. This new site will provide you with all the information you need about our school, including admissions, academics, events, and more.</p><p>Please explore the site and let us know if you have any feedback or suggestions.</p>',
                'category_id' => $category->id,
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => '2024 Admission Now Open',
                'slug' => '2024-admission-now-open',
                'excerpt' => 'Applications for the 2024 academic year are now being accepted.',
                'content' => '<p>We are pleased to announce that applications for the 2024 academic year are now being accepted. Please visit our admissions page for more information on how to apply.</p><p>We look forward to welcoming new students to our school community.</p>',
                'category_id' => $category->id,
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'End of Term Examinations',
                'slug' => 'end-of-term-examinations',
                'excerpt' => 'End of term examinations will begin on July 15th, 2024.',
                'content' => '<p>End of term examinations will begin on July 15th, 2024. Students are advised to prepare adequately for the examinations.</p><p>The examination timetable will be published on the school notice board and on our website.</p>',
                'category_id' => $category->id,
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
