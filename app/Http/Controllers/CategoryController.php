<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display the specified category.
     */
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $posts = Post::where('category_id', $category->id)
            ->published()
            ->latest('published_at')
            ->paginate(10);

        // Get all categories with post count for sidebar
        $categories = Category::withCount('posts')->get();

        // Get recent posts for sidebar
        $recentPosts = Post::published()
            ->latest('published_at')
            ->take(5)
            ->get();

        return view('categories.show', compact('category', 'posts', 'categories', 'recentPosts'));
    }
}
