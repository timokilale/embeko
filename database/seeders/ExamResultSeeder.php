<?php

namespace Database\Seeders;

use App\Models\ExamResult;
use Illuminate\Database\Seeder;

class ExamResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $examResults = [
            [
                'exam_name' => 'NECTA',
                'year' => 2022,
                'class' => 'Form 4',
                'results_data' => json_encode([
                    'total_students' => 120,
                    'division_1' => 25,
                    'division_2' => 45,
                    'division_3' => 30,
                    'division_4' => 15,
                    'division_0' => 5,
                    'subjects' => [
                        'Mathematics' => ['A' => 20, 'B' => 35, 'C' => 40, 'D' => 20, 'F' => 5],
                        'Physics' => ['A' => 15, 'B' => 30, 'C' => 45, 'D' => 25, 'F' => 5],
                        'Chemistry' => ['A' => 18, 'B' => 32, 'C' => 42, 'D' => 23, 'F' => 5],
                        'Biology' => ['A' => 22, 'B' => 38, 'C' => 35, 'D' => 20, 'F' => 5],
                        'English' => ['A' => 25, 'B' => 40, 'C' => 35, 'D' => 15, 'F' => 5],
                        'Kiswahili' => ['A' => 30, 'B' => 45, 'C' => 30, 'D' => 10, 'F' => 5],
                        'History' => ['A' => 20, 'B' => 35, 'C' => 40, 'D' => 20, 'F' => 5],
                        'Geography' => ['A' => 18, 'B' => 32, 'C' => 42, 'D' => 23, 'F' => 5],
                    ]
                ]),
                'summary' => json_encode([
                    'pass_rate' => 95.8,
                    'gpa' => 3.2,
                    'best_subject' => 'Kiswahili',
                    'worst_subject' => 'Physics',
                    'rank_in_district' => 3,
                    'rank_in_region' => 12,
                    'rank_in_country' => 156
                ])
            ],
            [
                'exam_name' => 'NECTA',
                'year' => 2023,
                'class' => 'Form 4',
                'results_data' => json_encode([
                    'total_students' => 135,
                    'division_1' => 30,
                    'division_2' => 50,
                    'division_3' => 35,
                    'division_4' => 15,
                    'division_0' => 5,
                    'subjects' => [
                        'Mathematics' => ['A' => 25, 'B' => 40, 'C' => 45, 'D' => 20, 'F' => 5],
                        'Physics' => ['A' => 20, 'B' => 35, 'C' => 50, 'D' => 25, 'F' => 5],
                        'Chemistry' => ['A' => 22, 'B' => 38, 'C' => 45, 'D' => 25, 'F' => 5],
                        'Biology' => ['A' => 25, 'B' => 40, 'C' => 40, 'D' => 25, 'F' => 5],
                        'English' => ['A' => 30, 'B' => 45, 'C' => 40, 'D' => 15, 'F' => 5],
                        'Kiswahili' => ['A' => 35, 'B' => 50, 'C' => 35, 'D' => 10, 'F' => 5],
                        'History' => ['A' => 25, 'B' => 40, 'C' => 45, 'D' => 20, 'F' => 5],
                        'Geography' => ['A' => 22, 'B' => 38, 'C' => 45, 'D' => 25, 'F' => 5],
                    ]
                ]),
                'summary' => json_encode([
                    'pass_rate' => 96.3,
                    'gpa' => 3.4,
                    'best_subject' => 'Kiswahili',
                    'worst_subject' => 'Chemistry',
                    'rank_in_district' => 2,
                    'rank_in_region' => 8,
                    'rank_in_country' => 120
                ])
            ],
            [
                'exam_name' => 'NECTA',
                'year' => 2024,
                'class' => 'Form 4',
                'results_data' => json_encode([
                    'total_students' => 150,
                    'division_1' => 35,
                    'division_2' => 55,
                    'division_3' => 40,
                    'division_4' => 15,
                    'division_0' => 5,
                    'subjects' => [
                        'Mathematics' => ['A' => 30, 'B' => 45, 'C' => 50, 'D' => 20, 'F' => 5],
                        'Physics' => ['A' => 25, 'B' => 40, 'C' => 55, 'D' => 25, 'F' => 5],
                        'Chemistry' => ['A' => 28, 'B' => 42, 'C' => 50, 'D' => 25, 'F' => 5],
                        'Biology' => ['A' => 30, 'B' => 45, 'C' => 45, 'D' => 25, 'F' => 5],
                        'English' => ['A' => 35, 'B' => 50, 'C' => 45, 'D' => 15, 'F' => 5],
                        'Kiswahili' => ['A' => 40, 'B' => 55, 'C' => 40, 'D' => 10, 'F' => 5],
                        'History' => ['A' => 30, 'B' => 45, 'C' => 50, 'D' => 20, 'F' => 5],
                        'Geography' => ['A' => 28, 'B' => 42, 'C' => 50, 'D' => 25, 'F' => 5],
                    ]
                ]),
                'summary' => json_encode([
                    'pass_rate' => 96.7,
                    'gpa' => 3.5,
                    'best_subject' => 'Kiswahili',
                    'worst_subject' => 'Physics',
                    'rank_in_district' => 1,
                    'rank_in_region' => 5,
                    'rank_in_country' => 98
                ])
            ]
        ];

        foreach ($examResults as $result) {
            ExamResult::create($result);
        }
    }
}
