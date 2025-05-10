<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the pages.
     */
    public function index()
    {
        $pages = Page::orderBy('title')->get();
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new page.
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created page in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_published' => 'boolean',
            'layout' => 'required|string|max:50',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        $data = $request->all();
        $data['is_published'] = $request->has('is_published');
        $data['slug'] = Str::slug($request->title);

        // Set default meta values if not provided
        if (empty($data['meta_title'])) {
            $data['meta_title'] = $data['title'];
        }

        if (empty($data['meta_description'])) {
            $data['meta_description'] = $data['description'];
        }

        $page = Page::create($data);

        return redirect()->route('admin.pages.edit', $page->id)
            ->with('success', 'Page created successfully. Now you can add sections to it.');
    }

    /**
     * Show the form for editing the specified page.
     */
    public function edit(string $id)
    {
        $page = Page::with('sections')->findOrFail($id);
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified page in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_published' => 'boolean',
            'layout' => 'required|string|max:50',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        $page = Page::findOrFail($id);

        $data = $request->all();
        $data['is_published'] = $request->has('is_published');

        // Set default meta values if not provided
        if (empty($data['meta_title'])) {
            $data['meta_title'] = $data['title'];
        }

        if (empty($data['meta_description'])) {
            $data['meta_description'] = $data['description'];
        }

        $page->update($data);

        return redirect()->route('admin.pages.edit', $page->id)
            ->with('success', 'Page updated successfully.');
    }

    /**
     * Remove the specified page from storage.
     */
    public function destroy(string $id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page deleted successfully.');
    }

    /**
     * Add a new section to the page.
     */
    public function addSection(Request $request, string $pageId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'identifier' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'type' => 'required|string|max:50',
        ]);

        $page = Page::findOrFail($pageId);

        // Get the highest order value and add 1
        $maxOrder = PageSection::where('page_id', $pageId)->max('order') ?? 0;

        // Always use HTML type for better content editing
        $section = new PageSection([
            'title' => $request->title,
            'identifier' => Str::slug($request->title) . '_' . time(), // Auto-generate a unique identifier
            'content' => $request->content,
            'type' => 'html', // Force HTML type for all sections
            'order' => $maxOrder + 1,
        ]);

        $page->sections()->save($section);

        return redirect()->route('admin.pages.edit', $pageId)
            ->with('success', 'Section added successfully.');
    }

    /**
     * Update a section.
     */
    public function updateSection(Request $request, string $pageId, string $sectionId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'identifier' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'type' => 'required|string|max:50',
        ]);

        $section = PageSection::where('page_id', $pageId)->findOrFail($sectionId);

        // Keep the existing identifier if it exists, otherwise generate a new one
        $identifier = $section->identifier;
        if (empty($identifier)) {
            $identifier = Str::slug($request->title) . '_' . time();
        }

        $section->update([
            'title' => $request->title,
            'identifier' => $identifier,
            'content' => $request->content,
            'type' => 'html', // Force HTML type for all sections
        ]);

        return redirect()->route('admin.pages.edit', $pageId)
            ->with('success', 'Section updated successfully.');
    }

    /**
     * Remove a section.
     */
    public function deleteSection(string $pageId, string $sectionId)
    {
        $section = PageSection::where('page_id', $pageId)->findOrFail($sectionId);
        $section->delete();

        return redirect()->route('admin.pages.edit', $pageId)
            ->with('success', 'Section deleted successfully.');
    }

    /**
     * Reorder sections.
     */
    public function reorderSections(Request $request, string $pageId)
    {
        $request->validate([
            'sections' => 'required|array',
            'sections.*' => 'integer|exists:page_sections,id',
        ]);

        $sections = $request->sections;

        foreach ($sections as $order => $sectionId) {
            PageSection::where('id', $sectionId)->update(['order' => $order]);
        }

        return response()->json(['success' => true]);
    }
}
