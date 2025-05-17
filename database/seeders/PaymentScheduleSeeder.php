<?php

namespace Database\Seeders;

use App\Models\Form;
use App\Models\PaymentSchedule;
use App\Models\Year;
use Illuminate\Database\Seeder;

class PaymentScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $form_one = Form::where('name', 'Form I')->first();
        $form_two = Form::where('name', 'Form II')->first();
        $form_three = Form::where('name', 'Form III')->first();
        $form_four = Form::where('name', 'Form IV')->first();

        $year = Year::where('year', date('Y'))->first();

        if (!$year) {
            $this->command->warn('No year found for current year. Skipping PaymentScheduleSeeder.');
            return;
        }

        // Form I
        $form_one->paymentSchedules()->createMany([
            ['year_id' => $year->id, 'title' => 'January Installment - Boarding Students', 'amount' => 573000],
            ['year_id' => $year->id, 'title' => 'January Installment - Day Students', 'amount' => 473000],
            ['year_id' => $year->id, 'title' => 'April Installment - Boarding Students', 'amount' => 350000],
            ['year_id' => $year->id, 'title' => 'April Installment - Day Students', 'amount' => 250000],
            ['year_id' => $year->id, 'title' => 'July Installment - Boarding Students', 'amount' => 350000],
            ['year_id' => $year->id, 'title' => 'July Installment - Day Students', 'amount' => 250000],
            ['year_id' => $year->id, 'title' => 'September Installment - Boarding Students', 'amount' => 350000],
            ['year_id' => $year->id, 'title' => 'September Installment - Day Students', 'amount' => 250000],
        ]);

        // Form II
        $form_two->paymentSchedules()->createMany([
            ['year_id' => $year->id, 'title' => 'January Installment - Boarding Students', 'amount' => 461000],
            ['year_id' => $year->id, 'title' => 'January Installment - Day Students', 'amount' => 348000],
            ['year_id' => $year->id, 'title' => 'April Installment - Boarding Students', 'amount' => 325000],
            ['year_id' => $year->id, 'title' => 'April Installment - Day Students', 'amount' => 212500],
            ['year_id' => $year->id, 'title' => 'May Installment - Boarding Students', 'amount' => 100000],
            ['year_id' => $year->id, 'title' => 'July Installment - Boarding Students', 'amount' => 325000],
            ['year_id' => $year->id, 'title' => 'July Installment - Day Students', 'amount' => 212500],
            ['year_id' => $year->id, 'title' => 'September Installment - Boarding Students', 'amount' => 325000],
            ['year_id' => $year->id, 'title' => 'September Installment - Day Students', 'amount' => 212500],
        ]);

        // Form III
        $form_three->paymentSchedules()->createMany([
            ['year_id' => $year->id, 'title' => 'January Installment - Boarding Students', 'amount' => 406000],
            ['year_id' => $year->id, 'title' => 'January Installment - Day Students', 'amount' => 293000],
            ['year_id' => $year->id, 'title' => 'April Installment - Boarding Students', 'amount' => 325000],
            ['year_id' => $year->id, 'title' => 'April Installment - Day Students', 'amount' => 212500],
            ['year_id' => $year->id, 'title' => 'July Installment - Boarding Students', 'amount' => 325000],
            ['year_id' => $year->id, 'title' => 'July Installment - Day Students', 'amount' => 212500],
            ['year_id' => $year->id, 'title' => 'September Installment - Boarding Students', 'amount' => 325000],
            ['year_id' => $year->id, 'title' => 'September Installment - Day Students', 'amount' => 212500],
        ]);

        // Form IV
        $form_four->paymentSchedules()->createMany([
            ['year_id' => $year->id, 'title' => 'January Installment - Boarding Students', 'amount' => 556000],
            ['year_id' => $year->id, 'title' => 'January Installment - Day Students', 'amount' => 413000],
            ['year_id' => $year->id, 'title' => 'April Installment - Boarding Students', 'amount' => 325000],
            ['year_id' => $year->id, 'title' => 'April Installment - Day Students', 'amount' => 212500],
            ['year_id' => $year->id, 'title' => 'May Installment - Boarding Students', 'amount' => 100000],
            ['year_id' => $year->id, 'title' => 'July Installment - Boarding Students', 'amount' => 325000],
            ['year_id' => $year->id, 'title' => 'July Installment - Day Students', 'amount' => 212500],
            ['year_id' => $year->id, 'title' => 'September Installment - Boarding Students', 'amount' => 325000],
            ['year_id' => $year->id, 'title' => 'September Installment - Day Students', 'amount' => 212500],
        ]);
    }
}
