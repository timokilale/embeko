<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'title' => 'Fees Structure',
                'slug' => 'fees',
                'description' => 'Embeko Secondary School offers quality education at competitive and affordable fees.',
                'is_published' => true,
                'layout' => 'fees',
                'meta_title' => 'Fees Structure - Embeko Secondary School',
                'meta_description' => 'View our comprehensive fees structure for both Ordinary and Advanced level students.',
                'meta_keywords' => 'fees, tuition, school fees, payment, scholarship',
            ],
            [
                'title' => 'Home',
                'slug' => 'home',
                'description' => 'Welcome to Embeko Secondary School – shaping bright futures through quality education.',
                'layout' => 'home',
                'meta_title' => 'Home - Embeko Secondary School',
                'meta_description' => 'Discover Embeko Secondary School: quality education, modern facilities, and student success.',
                'meta_keywords' => 'Embeko, secondary school, education, home, learning',
            ],
            [
                'title' => 'About Us',
                'slug' => 'about-us',
                'description' => 'Learn more about Embeko Secondary School – our history, mission, vision, and core values.',
                'layout' => 'about',
                'meta_title' => 'About Us - Embeko Secondary School',
                'meta_description' => 'Get to know Embeko Secondary School: our story, mission, and values.',
                'meta_keywords' => 'about, school, mission, history, vision',
            ],
            [
                'title' => 'Admissions',
                'slug' => 'admissions',
                'description' => 'Join Embeko Secondary School – information on admissions, requirements, and enrollment process.',
                'layout' => 'admission',
                'meta_title' => 'Admissions - Embeko Secondary School',
                'meta_description' => 'Explore how to apply to Embeko Secondary School – admissions criteria and guidelines.',
                'meta_keywords' => 'admission, apply, enrollment, school requirements',
            ],
            [
                'title' => 'Examination Results',
                'slug' => 'results',
                'description' => 'Access the latest examination results for students at Embeko Secondary School.',
                'layout' => 'results',
                'meta_title' => 'Results - Embeko Secondary School',
                'meta_description' => 'Check national and internal examination results for our students.',
                'meta_keywords' => 'results, exams, performance, grades, marks',
            ],
            [
                'title' => 'News',
                'slug' => 'news',
                'description' => 'Stay updated with the latest news and announcements from Embeko Secondary School.',
                'layout' => 'news',
                'meta_title' => 'News - Embeko Secondary School',
                'meta_description' => 'Latest news, updates, and school events from Embeko Secondary School.',
                'meta_keywords' => 'news, updates, school announcements, press',
            ],
            [
                'title' => 'Events',
                'slug' => 'events',
                'description' => 'View upcoming and past events at Embeko Secondary School.',
                'layout' => 'events',
                'meta_title' => 'Events - Embeko Secondary School',
                'meta_description' => 'Discover school events including sports, cultural days, and academic activities.',
                'meta_keywords' => 'events, calendar, activities, school life',
            ],
            [
                'title' => 'Downloads',
                'slug' => 'downloads',
                'description' => 'Download important school documents such as forms, brochures, and timetables.',
                'layout' => 'downloads',
                'meta_title' => 'Downloads - Embeko Secondary School',
                'meta_description' => 'Access downloadable resources from Embeko Secondary School.',
                'meta_keywords' => 'downloads, forms, brochures, documents, resources',
            ],
            [
                'title' => 'Contact Us',
                'slug' => 'contact-us',
                'description' => 'Reach out to Embeko Secondary School – contact information and inquiry form.',
                'layout' => 'contact',
                'meta_title' => 'Contact - Embeko Secondary School',
                'meta_description' => 'Contact Embeko Secondary School: phone, email, and address.',
                'meta_keywords' => 'contact, address, phone, email, map',
            ],
            [
                'title' => 'Academic Performance',
                'slug' => 'overall-performance',
                'description' => 'View the academic performance and rankings of Embeko Secondary School.',
                'layout' => 'overall-performance',
                'meta_title' => 'Performance - Embeko Secondary School',
                'meta_description' => 'Learn more about student performance, rankings, and academic progress.',
                'meta_keywords' => 'performance, academic results, excellence, ranking',
            ],
        ];

        foreach ($pages as $page) {
            Page::create(array_merge($page, ['is_published' => true]));
        }
    }
}
