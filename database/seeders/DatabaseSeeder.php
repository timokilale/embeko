<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Year;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call([
        //     UserSeeder::class,
        //     CategorySeeder::class,
        //     SchoolInfoSeeder::class,
        //     PostSeeder::class,
        //     EventSeeder::class,
        //     ExamResultSeeder::class,
        //     PagesSeeder::class,
        // ]);
        $this->call([
            // FormSeeder::class
            // YearSeeder::class
//            FeeSeeder::class
        PaymentScheduleSeeder::class,
        ]);
    }
}
