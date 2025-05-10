<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category')->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string', // Changed to nullable since we'll check content_ck too
            'content_ck' => 'nullable|string', // Added for CKEditor content
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        // Validate that at least one content field has data
        if (empty($request->content) && empty($request->content_ck)) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['content' => 'The content field is required.']);
        }

        $data = $request->all();

        // Use content_ck if content is empty
        if (empty($data['content']) && !empty($data['content_ck'])) {
            $data['content'] = $data['content_ck'];
        }

        // Remove content_ck from data before saving
        unset($data['content_ck']);
        $data['slug'] = Str::slug($request->title);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('posts', 'public');
            $data['featured_image'] = $imagePath;
        }

        // Set published_at date if status is published
        if ($request->status == 'published' && empty($request->published_at)) {
            $data['published_at'] = now();
        }

        Post::create($data);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string', // Changed to nullable since we'll check content_ck too
            'content_ck' => 'nullable|string', // Added for CKEditor content
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        // Validate that at least one content field has data
        if (empty($request->content) && empty($request->content_ck)) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['content' => 'The content field is required.']);
        }

        $post = Post::findOrFail($id);
        $data = $request->all();

        // Use content_ck if content is empty
        if (empty($data['content']) && !empty($data['content_ck'])) {
            $data['content'] = $data['content_ck'];
        }

        // Remove content_ck from data before saving
        unset($data['content_ck']);

        // Only update slug if title has changed
        if ($post->title != $request->title) {
            $data['slug'] = Str::slug($request->title);
        }

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }

            $imagePath = $request->file('featured_image')->store('posts', 'public');
            $data['featured_image'] = $imagePath;
        }

        // Set published_at date if status is changed to published
        if ($request->status == 'published' && $post->status != 'published') {
            $data['published_at'] = now();
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        // Delete featured image if exists
        if ($post->featured_image) {
            Storage::disk('public')->delete($post->featured_image);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post deleted successfully.');
    }
}
