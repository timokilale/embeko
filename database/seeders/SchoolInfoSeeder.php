<?php

namespace Database\Seeders;

use App\Models\SchoolInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if school info already exists
        if (SchoolInfo::count() === 0) {
            SchoolInfo::create([
                'name' => 'Embeko Secondary School',
                'slogan' => 'Education with excellency',
                'email' => 'info@embeko.ac.tz',
                'phone' => '+255 123 456 789',
                'address' => 'P.O. Box 1234, Dodoma, Tanzania',
                'about' => 'Embeko Secondary School is a premier educational institution committed to providing quality education with excellence. Founded in 2005, we have established ourselves as one of the leading secondary schools in Tanzania, dedicated to nurturing well-rounded individuals who excel academically and possess strong moral values.',
                'mission' => 'To provide quality education that develops the intellectual, physical, social, and moral capabilities of our students, preparing them to be responsible citizens and future leaders.',
                'vision' => 'To be a center of academic excellence that nurtures innovative, ethical, and globally competitive individuals who contribute positively to society.',
                'facebook' => 'https://facebook.com/embekosecondary',
                'twitter' => 'https://twitter.com/embekosecondary',
                'instagram' => 'https://instagram.com/embekosecondary',
                'youtube' => 'https://youtube.com/embekosecondary',
                'linkedin' => 'https://linkedin.com/company/embekosecondary',
            ]);
        }
    }
}
