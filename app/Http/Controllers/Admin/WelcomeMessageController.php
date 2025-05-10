<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WelcomeMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WelcomeMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $welcomeMessages = WelcomeMessage::orderBy('created_at', 'desc')->get();
        return view('admin.welcome-messages.index', compact('welcomeMessages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.welcome-messages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'author_name' => 'nullable|string|max:255',
            'author_title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ]);

        $data = $request->except('image');
        $data['is_active'] = $request->has('is_active');

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/uploads/welcome', $imageName);
            $data['image'] = 'uploads/welcome/' . $imageName;
        }

        // If this is set as active, deactivate all other welcome messages
        if ($data['is_active']) {
            WelcomeMessage::where('is_active', true)->update(['is_active' => false]);
        }

        WelcomeMessage::create($data);

        return redirect()->route('admin.welcome-messages.index')
            ->with('success', 'Welcome message created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $welcomeMessage = WelcomeMessage::findOrFail($id);
        return view('admin.welcome-messages.show', compact('welcomeMessage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $welcomeMessage = WelcomeMessage::findOrFail($id);
        return view('admin.welcome-messages.edit', compact('welcomeMessage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'author_name' => 'nullable|string|max:255',
            'author_title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ]);

        $welcomeMessage = WelcomeMessage::findOrFail($id);

        $data = $request->except(['image', '_token', '_method']);
        $data['is_active'] = $request->has('is_active');

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($welcomeMessage->image && Storage::exists('public/' . $welcomeMessage->image)) {
                Storage::delete('public/' . $welcomeMessage->image);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/uploads/welcome', $imageName);
            $data['image'] = 'uploads/welcome/' . $imageName;
        }

        // If this is set as active, deactivate all other welcome messages
        if ($data['is_active'] && !$welcomeMessage->is_active) {
            WelcomeMessage::where('id', '!=', $id)
                ->where('is_active', true)
                ->update(['is_active' => false]);
        }

        $welcomeMessage->update($data);

        return redirect()->route('admin.welcome-messages.index')
            ->with('success', 'Welcome message updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $welcomeMessage = WelcomeMessage::findOrFail($id);

        // Delete image if exists
        if ($welcomeMessage->image && Storage::exists('public/' . $welcomeMessage->image)) {
            Storage::delete('public/' . $welcomeMessage->image);
        }

        $welcomeMessage->delete();

        return redirect()->route('admin.welcome-messages.index')
            ->with('success', 'Welcome message deleted successfully.');
    }

    /**
     * Set a welcome message as active.
     */
    public function setActive(string $id)
    {
        // Deactivate all welcome messages
        WelcomeMessage::where('is_active', true)->update(['is_active' => false]);

        // Activate the selected welcome message
        $welcomeMessage = WelcomeMessage::findOrFail($id);
        $welcomeMessage->update(['is_active' => true]);

        return redirect()->route('admin.welcome-messages.index')
            ->with('success', 'Welcome message set as active successfully.');
    }
}
