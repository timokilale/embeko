<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use Illuminate\Http\Request;

class FeeController extends Controller
{

    public function index()
    {
        $fees =  Fee::all();
        return view('admin.fees.index', compact('fees'));
    }
    public function create()
    {
        return view('admin.fees.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'description' => 'required',
            'category' => 'required',
            'due_date' => 'date|nullable'
        ]);

        Fee::create($validated);

        return redirect()->route('admin.fees.index')->with('success', 'Fee created successfully.');
    }

    public function edit(Fee $fee)
    {
        return view('admin.fees.edit', compact('fee'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'description' => 'required',
            'category' => 'required',
            'due_date' => 'date|nullable'
        ]);

        $fee = Fee::findOrFail($id);
        $fee->update($validated);

        return redirect()->route('admin.fees.index')->with('success', 'Fee updated successfully.');
    }
}
