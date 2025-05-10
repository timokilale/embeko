<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Post;
use App\Models\Category;

// Check categories
echo "Checking categories...\n";
$categories = Category::withCount('posts')->get();
foreach ($categories as $category) {
    echo "Category: {$category->name}, Posts Count: {$category->posts_count}\n";
}

// Check for announcement posts
echo "\nChecking for announcement posts...\n";
$announcementCategory = Category::where('name', 'like', '%Announcement%')->first();

if ($announcementCategory) {
    echo "Found announcement category: {$announcementCategory->name} (ID: {$announcementCategory->id})\n";
    
    // Get all posts in this category
    $posts = Post::where('category_id', $announcementCategory->id)->get();
    
    if ($posts->count() > 0) {
        echo "Found {$posts->count()} post(s) in this category:\n";
        
        foreach ($posts as $post) {
            echo "-----------------------------------\n";
            echo "Post ID: {$post->id}\n";
            echo "Title: {$post->title}\n";
            echo "Slug: {$post->slug}\n";
            echo "Is Published: " . ($post->is_published ? 'Yes' : 'No') . "\n";
            echo "Published At: " . ($post->published_at ? $post->published_at->format('Y-m-d H:i:s') : 'NULL') . "\n";
            
            // Check if this post would be returned by the published scope
            $isVisibleWithPublishedScope = Post::where('id', $post->id)
                ->published()
                ->exists();
                
            echo "Would be visible with published scope: " . ($isVisibleWithPublishedScope ? 'Yes' : 'No') . "\n";
            
            if (!$isVisibleWithPublishedScope) {
                echo "Reason not visible: ";
                if (!$post->is_published) {
                    echo "is_published is false";
                } elseif (!$post->published_at) {
                    echo "published_at is NULL";
                } elseif ($post->published_at > now()) {
                    echo "published_at is in the future";
                } else {
                    echo "Unknown reason";
                }
                echo "\n";
            }
        }
    } else {
        echo "No posts found in this category.\n";
    }
} else {
    echo "No announcement category found.\n";
}

echo "\nDone.\n";
