<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'title' => 'School Open Day',
                'slug' => 'school-open-day',
                'description' => 'Join us for our annual Open Day where prospective students and parents can tour the school, meet teachers, and learn about our programs.',
                'location' => 'Embeko Secondary School',
                'start_date' => now()->addDays(30)->setTime(9, 0),
                'end_date' => now()->addDays(30)->setTime(15, 0),
                'is_featured' => true,
            ],
            [
                'title' => 'Parent-Teacher Meeting',
                'slug' => 'parent-teacher-meeting',
                'description' => 'A meeting for parents to discuss their children\'s progress with teachers.',
                'location' => 'Embeko Secondary School',
                'start_date' => now()->addDays(15)->setTime(14, 0),
                'end_date' => now()->addDays(15)->setTime(17, 0),
                'is_featured' => false,
            ],
            [
                'title' => 'Sports Day',
                'slug' => 'sports-day',
                'description' => 'Annual sports day featuring various athletic competitions between houses.',
                'location' => 'Embeko Secondary School Sports Ground',
                'start_date' => now()->addDays(45)->setTime(8, 0),
                'end_date' => now()->addDays(45)->setTime(16, 0),
                'is_featured' => true,
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
