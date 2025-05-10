<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     */
    public function index(Request $request)
    {
        $query = Post::with('category')
            ->published()
            ->latest('published_at');

        // Filter by search term
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $posts = $query->paginate(10);

        // Get categories with post count
        $categories = Category::withCount('posts')->get();

        // Get recent posts for sidebar
        $recentPosts = Post::published()
            ->latest('published_at')
            ->take(5)
            ->get();

        return view('posts.index', compact('posts', 'categories', 'recentPosts'));
    }

    /**
     * Display the specified post.
     */
    public function show($slug)
    {
        $post = Post::with('category')
            ->where('slug', $slug)
            ->published()
            ->firstOrFail();

        // Get categories with post count for sidebar
        $categories = Category::withCount('posts')->get();

        // Get recent posts for sidebar
        $recentPosts = Post::published()
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->take(5)
            ->get();

        // Get related posts
        $relatedPosts = Post::published()
            ->where('id', '!=', $post->id)
            ->where('category_id', $post->category_id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('posts.show', compact('post', 'categories', 'recentPosts', 'relatedPosts'));
    }
}
