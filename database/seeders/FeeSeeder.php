<?php

namespace Database\Seeders;

use App\Models\Fee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fees = [
            [
                'name' =>'TAALUMA',
                'amount' => 20000
            ],

            [
                'name' =>'KITABULISHO',
                'amount' => 5000
            ],

            [
                'name' =>'BIMA',
                'amount' => 6000
            ],
            [
                'name' =>'UKARABATI',
                'amount' => 20000
            ],

            [
                'name' =>'FIRST AID',
                'amount' => 10000
            ],

            [
                'name' =>'MICHEZO',
                'amount' => 10000
            ],

            [
                'name' =>'MAHAFALI',
                'amount' => 5000
            ],

            [
                'name' =>'SARE',
                'amount' => 140000
            ],

            [
                'name' =>'ADA BWENI',
                'amount' => 1300000
            ],
            [
                'name' =>'ADA DAY',
                'amount' => 850000
            ],

            [
                'name' =>'ADA BWENI FM1',
                'amount' => 1400000
            ],
            [
                'name' =>'ADA DAY FM1',
                'amount' => 1000000
            ],

            [
                'name' =>'NECTA FM2',
                'amount' => 10000
            ],
            [
                'name' =>'NECTA FM4',
                'amount' => 50000
            ],

            [
                'name' =>'CSSC',
                'amount' => 25000
            ],
            [
                'name' =>'PICHA',
                'amount' => 5000
            ],
            [
                'name' =>'MOCK FM4',
                'amount' => 40000
            ],
            [
                'name' =>'MOCK F2',
                'amount' => 15000
            ],
            [
                'name' =>'LIKIZO',
                'amount' => 100000
            ]
        
        ];

        foreach ($fees as $key => $fee) {
            Fee::create($fee);
        }
    }
}
