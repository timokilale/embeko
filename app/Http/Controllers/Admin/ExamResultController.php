<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExamResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExamResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ExamResult::query();

        // Filter by exam
        if ($request->has('exam_name')) {
            $query->where('exam_name', $request->exam_name);
        }

        // Filter by year
        if ($request->has('year')) {
            $query->where('year', $request->year);
        }

        // Filter by class
        if ($request->has('class')) {
            $query->where('class', $request->class);
        }

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('exam_name', 'like', "%{$search}%")
                  ->orWhere('class', 'like', "%{$search}%")
                  ->orWhere('student_name', 'like', "%{$search}%");
            });
        }

        $results = $query->latest()->paginate(10);

        // Get distinct values for filters
        $years = ExamResult::select('year')->distinct()->orderBy('year', 'desc')->pluck('year');
        $exams = ExamResult::select('exam_name')->distinct()->pluck('exam_name');
        $classes = ExamResult::select('class')->distinct()->pluck('class');

        return view('admin.exam-results.index', compact('results', 'years', 'exams', 'classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.exam-results.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'exam_name' => 'required|string|max:100',
            'year' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'class' => 'required|string|max:50',
            'student_name' => 'nullable|string|max:255',
            'results_file' => 'required_without:results_data|file|mimes:pdf,doc,docx,xls,xlsx,csv|max:10240',
            'results_data' => 'required_without:results_file|nullable|string',
            'is_published' => 'boolean',
        ]);

        $data = $request->all();
        $data['is_published'] = $request->has('is_published');

        // Handle file upload
        if ($request->hasFile('results_file')) {
            $filePath = $request->file('results_file')->store('exam-results', 'public');
            $data['file_path'] = $filePath;
        }

        ExamResult::create($data);

        return redirect()->route('admin.exam-results.index')
            ->with('success', 'Exam result created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = ExamResult::findOrFail($id);
        return view('admin.exam-results.show', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $result = ExamResult::findOrFail($id);
        return view('admin.exam-results.edit', compact('result'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $result = ExamResult::findOrFail($id);

        $request->validate([
            'exam_name' => 'required|string|max:100',
            'year' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'class' => 'required|string|max:50',
            'student_name' => 'nullable|string|max:255',
            'results_file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,csv|max:10240',
            'results_data' => 'nullable|string',
            'is_published' => 'boolean',
        ]);

        $data = $request->all();
        $data['is_published'] = $request->has('is_published');

        // Handle file upload
        if ($request->hasFile('results_file')) {
            // Delete old file if exists
            if ($result->file_path) {
                Storage::disk('public')->delete($result->file_path);
            }

            $filePath = $request->file('results_file')->store('exam-results', 'public');
            $data['file_path'] = $filePath;
        }

        $result->update($data);

        return redirect()->route('admin.exam-results.index')
            ->with('success', 'Exam result updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = ExamResult::findOrFail($id);

        // Delete file if exists
        if ($result->file_path) {
            Storage::disk('public')->delete($result->file_path);
        }

        $result->delete();

        return redirect()->route('admin.exam-results.index')
            ->with('success', 'Exam result deleted successfully.');
    }
}
