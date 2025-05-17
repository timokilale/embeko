<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\FeeForm;
use App\Models\Form;
use App\Models\Year;

use Illuminate\Http\Request;

class FeeAssignmentController extends Controller
{

    public function index()
    {

        $feeComponents = Fee::all();
        $years = Year::all();
        $forms = Form::all();
        return view('admin.fees.assignFees', compact('years', 'forms', 'feeComponents'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'year' => ['required', 'integer', 'exists:years,id'],
            'grade_level_id' => ['required', 'integer', 'exists:forms,id'],
            'components' => ['required', 'array', 'min:1'],
            'components.*.enabled' => ['nullable'],
            'components.*.amount' => ['required_with:components.*.enabled', 'numeric', 'min:0'],
        ], [
            'components.required' => 'You must select at least one fee component.',
            'components.*.amount.required_with' => 'Please enter an amount for each selected component.',
        ]);

        $form = Form::findOrFail($data['grade_level_id']);
        $year = Year::findOrFail($data['year']);
//        dd($year);


        foreach ($request['components'] as $component) {
            FeeForm::updateOrCreate([
                'form_id' => $form->id,
                'year_id' => $year->id,
                'fee_id' => $component,
                'fee_category_id' => 2
            ],[
                'form_id' => $form->id,
                'year_id' => $year->id,
                'fee_id' => $component,
                'fee_category_id' => 2
            ]);
        }

        return to_route('admin.fees.index')
            ->with('success', 'Fees assigned successfully.');
    }

}
