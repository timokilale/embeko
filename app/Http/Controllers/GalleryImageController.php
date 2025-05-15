<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryImageController extends Controller
{
    public function index()
    {
        $images = GalleryImage::latest()->get(); // Or paginate()
        return view('pages.gallery', compact('images'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|max:2048',
        ]);

        foreach ($request->file('images') as $file) {
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/gallery', $filename);

            GalleryImage::create(['filename' => $filename]);
        }

        return redirect()->route('admin.gallery.create')->with('success', 'Images uploaded successfully.');
    }

    public function manage()
    {
        $images = GalleryImage::latest()->get();
        return view('admin.gallery.manage', compact('images'));
    }

    public function destroy(GalleryImage $image)
    {
        Storage::delete('public/gallery/' . $image->filename);
        $image->delete();

        return redirect()->route('admin.gallery.manage')->with('success', 'Image deleted successfully.');
    }
}
