<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DownloadController extends Controller
{
    /**
     * Display a listing of the downloads.
     */
    public function index()
    {
        $downloads = Download::latest()->paginate(10);
        return response()->json($downloads);
    }

    /**
     * Display the specified download.
     */
    public function show(Download $download)
    {
        return response()->json($download);
    }

    /**
     * Store a newly created download in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|file|max:10240', // 10MB max
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        $download = new Download();
        $download->title = $request->title;
        $download->description = $request->description;
        $download->download_count = 0;
        $download->user_id = Auth::id();
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('downloads', 'public');
            $download->file_path = $filePath;
            $download->file_type = $file->getClientOriginalExtension();
        }
        
        $download->save();
        
        return response()->json([
            'message' => 'Download created successfully',
            'download' => $download
        ], 201);
    }

    /**
     * Update the specified download in storage.
     */
    public function update(Request $request, Download $download)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|file|max:10240', // 10MB max
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        $download->title = $request->title;
        $download->description = $request->description;
        
        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($download->file_path && Storage::disk('public')->exists($download->file_path)) {
                Storage::disk('public')->delete($download->file_path);
            }
            
            $file = $request->file('file');
            $filePath = $file->store('downloads', 'public');
            $download->file_path = $filePath;
            $download->file_type = $file->getClientOriginalExtension();
        }
        
        $download->save();
        
        return response()->json([
            'message' => 'Download updated successfully',
            'download' => $download
        ]);
    }

    /**
     * Remove the specified download from storage.
     */
    public function destroy(Download $download)
    {
        // Delete file if exists
        if ($download->file_path && Storage::disk('public')->exists($download->file_path)) {
            Storage::disk('public')->delete($download->file_path);
        }
        
        $download->delete();
        
        return response()->json(['message' => 'Download deleted successfully']);
    }
}
