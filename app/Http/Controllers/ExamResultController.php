<?php

namespace App\Http\Controllers;

use App\Models\ExamResult;
use Illuminate\Http\Request;

class ExamResultController extends Controller
{
    /**
     * Display a listing of the exam results.
     */
    public function index()
    {
        return view('results.index');
    }

    /**
     * Display the specified exam result.
     */
    public function show($exam, $year)
    {
        $examResult = ExamResult::where('exam_name', $exam)
            ->where('year', $year)
            ->first();

        return view('results.show', compact('examResult', 'exam', 'year'));
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

        return view('results.summary', compact('examResults'));
    }

    /**
     * Display visualizations of exam results.
     */
    public function visualize($exam, $year)
    {
        $examResult = ExamResult::where('exam_name', $exam)
            ->where('year', $year)
            ->first();

        if (!$examResult) {
            return redirect()->route('results.index')->with('error', 'Exam result not found.');
        }

        return view('results.visualize', compact('examResult', 'exam', 'year'));
    }

    /**
     * Display overall performance over the years.
     */
    public function overallPerformance()
    {
        $examResults = ExamResult::select('exam_name', 'year', 'results_data', 'summary')
            ->orderBy('year')
            ->orderBy('exam_name')
            ->get();

        return view('results.overall', compact('examResults'));
    }
}
