<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ExamResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ExamResultController extends Controller
{
    /**
     * Display a listing of the exam results.
     */
    public function index(Request $request)
    {
        $query = ExamResult::query();
        
        // Filter by year if provided
        if ($request->has('year')) {
            $query->byYear($request->year);
        }
        
        // Filter by exam if provided
        if ($request->has('exam')) {
            $query->byExam($request->exam);
        }
        
        // Filter by class if provided
        if ($request->has('class')) {
            $query->byClass($request->class);
        }
        
        $examResults = $query->latest()->paginate(10);
        
        return response()->json($examResults);
    }

    /**
     * Display the specified exam result.
     */
    public function show($exam, $year)
    {
        $examResult = ExamResult::where('exam_name', $exam)
            ->where('year', $year)
            ->first();
            
        if (!$examResult) {
            return response()->json(['message' => 'Exam result not found'], 404);
        }
        
        return response()->json($examResult);
    }

    /**
     * Display a summary of all exam results.
     */
    public function summary()
    {
        $examResults = ExamResult::select('exam_name', 'year', 'class', 'summary')
            ->orderBy('year', 'desc')
            ->orderBy('exam_name')
            ->get();
            
        return response()->json($examResults);
    }

    /**
     * Store a newly created exam result in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'exam_name' => 'required|string|max:255',
            'year' => 'required|string|max:4',
            'class' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:csv,xlsx,xls|max:2048',
            'results_data' => 'required|array',
            'summary' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        // Check if exam result already exists
        $existingResult = ExamResult::where('exam_name', $request->exam_name)
            ->where('year', $request->year)
            ->where('class', $request->class)
            ->first();
            
        if ($existingResult) {
            return response()->json([
                'message' => 'Exam result already exists for this exam, year, and class'
            ], 422);
        }
        
        $examResult = new ExamResult();
        $examResult->exam_name = $request->exam_name;
        $examResult->year = $request->year;
        $examResult->class = $request->class;
        $examResult->results_data = $request->results_data;
        $examResult->summary = $request->summary;
        $examResult->user_id = Auth::id();
        
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('exam_results', 'public');
            $examResult->file_path = $filePath;
        }
        
        $examResult->save();
        
        return response()->json([
            'message' => 'Exam result created successfully',
            'exam_result' => $examResult
        ], 201);
    }

    /**
     * Update the specified exam result in storage.
     */
    public function update(Request $request, ExamResult $examResult)
    {
        $validator = Validator::make($request->all(), [
            'exam_name' => 'required|string|max:255',
            'year' => 'required|string|max:4',
            'class' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:csv,xlsx,xls|max:2048',
            'results_data' => 'required|array',
            'summary' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        // Check if updating would create a duplicate
        $existingResult = ExamResult::where('exam_name', $request->exam_name)
            ->where('year', $request->year)
            ->where('class', $request->class)
            ->where('id', '!=', $examResult->id)
            ->first();
            
        if ($existingResult) {
            return response()->json([
                'message' => 'Another exam result already exists for this exam, year, and class'
            ], 422);
        }
        
        $examResult->exam_name = $request->exam_name;
        $examResult->year = $request->year;
        $examResult->class = $request->class;
        $examResult->results_data = $request->results_data;
        $examResult->summary = $request->summary;
        
        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($examResult->file_path && Storage::disk('public')->exists($examResult->file_path)) {
                Storage::disk('public')->delete($examResult->file_path);
            }
            
            $filePath = $request->file('file')->store('exam_results', 'public');
            $examResult->file_path = $filePath;
        }
        
        $examResult->save();
        
        return response()->json([
            'message' => 'Exam result updated successfully',
            'exam_result' => $examResult
        ]);
    }

    /**
     * Remove the specified exam result from storage.
     */
    public function destroy(ExamResult $examResult)
    {
        // Delete file if exists
        if ($examResult->file_path && Storage::disk('public')->exists($examResult->file_path)) {
            Storage::disk('public')->delete($examResult->file_path);
        }
        
        $examResult->delete();
        
        return response()->json(['message' => 'Exam result deleted successfully']);
    }
}
