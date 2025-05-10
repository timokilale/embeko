<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SchoolInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SchoolInfoController extends Controller
{
    /**
     * Display the school information.
     */
    public function index()
    {
        $schoolInfo = SchoolInfo::getInfo();
        return response()->json($schoolInfo);
    }

    /**
     * Update the school information.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slogan' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'about' => 'nullable|string',
            'mission' => 'nullable|string',
            'vision' => 'nullable|string',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $schoolInfo = SchoolInfo::getInfo();
        
        // Update fields
        $schoolInfo->name = $request->name;
        $schoolInfo->slogan = $request->slogan;
        $schoolInfo->email = $request->email;
        $schoolInfo->phone = $request->phone;
        $schoolInfo->address = $request->address;
        $schoolInfo->about = $request->about;
        $schoolInfo->mission = $request->mission;
        $schoolInfo->vision = $request->vision;
        $schoolInfo->facebook = $request->facebook;
        $schoolInfo->twitter = $request->twitter;
        $schoolInfo->instagram = $request->instagram;
        $schoolInfo->youtube = $request->youtube;
        $schoolInfo->linkedin = $request->linkedin;
        
        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($schoolInfo->logo && Storage::disk('public')->exists($schoolInfo->logo)) {
                Storage::disk('public')->delete($schoolInfo->logo);
            }
            
            $logoPath = $request->file('logo')->store('images', 'public');
            $schoolInfo->logo = $logoPath;
        }
        
        $schoolInfo->save();
        
        return response()->json([
            'message' => 'School information updated successfully',
            'data' => $schoolInfo
        ]);
    }
}
