<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class AnnouncementContoller extends Controller
{
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
