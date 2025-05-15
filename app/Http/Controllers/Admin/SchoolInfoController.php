<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolInfoController extends Controller
{
    /**
     * Show the form for editing the school information.
     */
    public function edit()
    {
        $schoolInfo = SchoolInfo::getInfo();
        return view('admin.school-info.edit', compact('schoolInfo'));
    }

    /**
     * Update the school information.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slogan' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'region' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:png,png,jpg,jpeg|max:1024',
            'favicon' => 'nullable|image|mimes:ico,png,jpg,jpeg|max:1024',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

//        dd($validated['logo']);

        $schoolInfo = SchoolInfo::first();
        if (!$schoolInfo) {
            $schoolInfo = new SchoolInfo();
        }

        // Handle file uploads
        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $logoPath = $request->file('logo')->store('school', 'public');
            $schoolInfo->logo = $logoPath;
        }


        if ($request->hasFile('favicon')) {
            if ($schoolInfo->favicon) {
                Storage::disk('public')->delete($schoolInfo->favicon);
            }

            $faviconPath = $request->file('favicon')->store('school', 'public');
            $schoolInfo->favicon = $faviconPath;
        }

        if ($request->hasFile('banner')) {
            if ($schoolInfo->banner) {
                Storage::disk('public')->delete($schoolInfo->banner);
            }

            $bannerPath = $request->file('banner')->store('school', 'public');
            $schoolInfo->banner = $bannerPath;
        }

        // Update text fields
        $schoolInfo->name = $request->name;
        $schoolInfo->slogan = $request->slogan;
        $schoolInfo->description = $request->description;
        $schoolInfo->address = $request->address;
        $schoolInfo->city = $request->city;
        $schoolInfo->region = $request->region;
        $schoolInfo->postal_code = $request->postal_code;
        $schoolInfo->country = $request->country;
        $schoolInfo->phone = $request->phone;
        $schoolInfo->email = $request->email;
        $schoolInfo->website = $request->website;
        $schoolInfo->facebook = $request->facebook;
        $schoolInfo->twitter = $request->twitter;
        $schoolInfo->instagram = $request->instagram;
        $schoolInfo->youtube = $request->youtube;
        $schoolInfo->linkedin = $request->linkedin;

        $schoolInfo->save();

        return redirect()->route('admin.school-info.edit')
            ->with('success', 'School information updated successfully.');
    }
}
