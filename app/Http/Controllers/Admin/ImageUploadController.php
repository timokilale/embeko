<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageUploadController extends Controller
{
    /**
     * Handle image upload from CKEditor
     */
    public function upload(Request $request)
    {
        if (!$request->hasFile('upload')) {
            return response()->json([
                'error' => [
                    'message' => 'No file uploaded'
                ]
            ], 400);
        }

        $file = $request->file('upload');
        
        // Validate the uploaded file
        $validator = validator()->make(['upload' => $file], [
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => [
                    'message' => $validator->errors()->first('upload')
                ]
            ], 400);
        }

        // Generate a unique filename
        $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
        
        // Store the file in the public disk under the uploads/images directory
        $file->storeAs('public/uploads/images', $fileName);
        
        // Get the URL to the stored image
        $url = asset('storage/uploads/images/' . $fileName);

        // Return the response in the format expected by CKEditor
        return response()->json([
            'url' => $url,
            // Include these fields for CKEditor 5 compatibility
            'uploaded' => 1,
            'fileName' => $fileName,
        ]);
    }
}
