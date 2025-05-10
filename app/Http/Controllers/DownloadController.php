<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    /**
     * Display a listing of the downloads.
     */
    public function index(Request $request)
    {
        $query = Download::query();

        // Filter by search term
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter by category
        if ($request->has('category')) {
            $category = $request->category;
            $query->where('category', $category);
        }

        $downloads = $query->latest()->paginate(12);

        return view('downloads.index', compact('downloads'));
    }

    /**
     * Download the specified file.
     */
    public function download($id)
    {
        $download = Download::findOrFail($id);

        // Increment download count
        $download->increment('download_count');

        // Check if file exists
        if (!Storage::disk('public')->exists($download->file_path)) {
            return back()->with('error', 'File not found.');
        }

        // Get file path
        $filePath = storage_path('app/public/' . $download->file_path);

        // Get file name
        $fileName = basename($download->file_path);

        // Return file download response
        return response()->download($filePath, $fileName);
    }
}
