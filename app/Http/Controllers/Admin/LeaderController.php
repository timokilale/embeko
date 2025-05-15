<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Leader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaders = Leader::orderBy('order')->get();
        return view('admin.leaders.index', compact('leaders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.leaders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_featured' => 'nullable',
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $path = $request->file('image')->store('events', 'public');
            $data['image'] = $path;
        }

        $data['is_featured'] = $request->has('is_featured');

        $data['slug'] = Str::slug($data['title']);

        Event::create($data);

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $leader = Leader::findOrFail($id);
        return view('admin.leaders.show', compact('leader'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $leader = Leader::findOrFail($id);
        return view('admin.leaders.edit', compact('leader'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ]);

        $leader = Leader::findOrFail($id);

        $data = $request->except(['image', '_token', '_method']);
        $data['is_active'] = $request->has('is_active');

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($leader->image && Storage::exists('public/' . $leader->image)) {
                Storage::delete('public/' . $leader->image);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/uploads/leaders', $imageName);
            $data['image'] = 'uploads/leaders/' . $imageName;
        }

        $leader->update($data);

        return redirect()->route('admin.leaders.index')
            ->with('success', 'Leader profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $leader = Leader::findOrFail($id);

        // Delete image if exists
        if ($leader->image && Storage::exists('public/' . $leader->image)) {
            Storage::delete('public/' . $leader->image);
        }

        $leader->delete();

        return redirect()->route('admin.leaders.index')
            ->with('success', 'Leader profile deleted successfully.');
    }

    /**
     * Update the order of leaders.
     */
    public function updateOrder(Request $request)
    {
        $request->validate([
            'leaders' => 'required|array',
            'leaders.*' => 'integer|exists:leaders,id',
        ]);

        $leaders = $request->leaders;

        foreach ($leaders as $order => $leaderId) {
            Leader::where('id', $leaderId)->update(['order' => $order]);
        }

        return response()->json(['success' => true]);
    }
}
