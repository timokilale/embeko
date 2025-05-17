<?php

namespace Database\Seeders;

use App\Models\Form;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $forms = [
            ['name' => 'Form I'],
            ['name' => 'Form II'],
            ['name' => 'Form III'],
            ['name' => 'Form IV'],
        ];

        foreach($forms as $form)
        {
            Form::create($form);
        }
    }
}
