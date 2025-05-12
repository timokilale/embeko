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
                'phone' => '+255 764 581 739',
                'address' => 'P.O. Box 106, Kondoa, Dodoma, Tanzania',
                'about' => 'Embeko Secondary School is a premier educational institution committed to providing quality education with excellence. Founded in 2005, we have established ourselves as one of the leading secondary schools in Tanzania, dedicated to nurturing well-rounded individuals who excel academically and possess strong moral values.',
                'mission' => 'To provide quality secondary education in a safe and caring environment, guided by Lutheran values, where faith, learning, and service go together, and where teachers, parents, and the community support students to become responsible and God-fearing citizens.',
                'vision' => 'To help students grow into confident, respectful, and successful people who can make a difference in the world.',
                'facebook' => 'https://facebook.com/embekosecondary',
                'twitter' => 'https://twitter.com/embekosecondary',
                'instagram' => 'https://instagram.com/embekosecondary',
                'youtube' => 'https://youtube.com/embekosecondary',
                'linkedin' => 'https://linkedin.com/company/embekosecondary',
            ]);
        }
    }
}
