<?php

namespace Database\Seeders;

use App\Models\Year;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $current = 2025;
        for($i=$current; $i<=2050; $i++)
        {
            Year::create(['year' => $i]);
        }
    }
}
