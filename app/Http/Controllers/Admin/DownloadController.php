<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Download::query();

        // Filter by category type
        if ($request->has('category_type')) {
            $query->where('category_type', $request->category_type);
        }

        // Filter by file type
        if ($request->has('file_type')) {
            $query->where('file_type', $request->file_type);
        }

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $downloads = $query->latest()->paginate(10);

        // Get distinct category types and file types for filters
        $categoryTypes = Download::select('category_type')->distinct()->whereNotNull('category_type')->pluck('category_type');
        $fileTypes = Download::select('file_type')->distinct()->whereNotNull('file_type')->pluck('file_type');

        return view('admin.downloads.index', compact('downloads', 'categoryTypes', 'fileTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.downloads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_type' => 'nullable|string|max:50',
            'file' => 'required|file|max:10240', // 10MB max
        ]);

        $data = $request->all();

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('downloads', 'public');
            $data['file_path'] = $filePath;
            $data['file_type'] = $file->getClientOriginalExtension();
            $data['file_size'] = $file->getSize();
        }

        Download::create($data);

        return redirect()->route('admin.downloads.index')
            ->with('success', 'Download created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $download = Download::findOrFail($id);
        return view('admin.downloads.show', compact('download'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $download = Download::findOrFail($id);
        return view('admin.downloads.edit', compact('download'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $download = Download::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_type' => 'nullable|string|max:50',
            'file' => 'nullable|file|max:10240', // 10MB max
        ]);

        $data = $request->all();

        // Handle file upload
        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($download->file_path) {
                Storage::disk('public')->delete($download->file_path);
            }

            $file = $request->file('file');
            $filePath = $file->store('downloads', 'public');
            $data['file_path'] = $filePath;
            $data['file_type'] = $file->getClientOriginalExtension();
            $data['file_size'] = $file->getSize();
        }

        $download->update($data);

        return redirect()->route('admin.downloads.index')
            ->with('success', 'Download updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $download = Download::findOrFail($id);

        // Delete file if exists
        if ($download->file_path) {
            Storage::disk('public')->delete($download->file_path);
        }

        $download->delete();

        return redirect()->route('admin.downloads.index')
            ->with('success', 'Download deleted successfully.');
    }
}
