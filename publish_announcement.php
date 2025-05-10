<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Post;
use App\Models\Category;

// Find the announcement post
$announcementCategory = Category::where('name', 'like', '%Announcement%')->first();

if ($announcementCategory) {
    $post = Post::where('category_id', $announcementCategory->id)->first();
    
    if ($post) {
        echo "Found announcement post: {$post->title}\n";
        echo "Current status: is_published = " . ($post->is_published ? 'true' : 'false') . "\n";
        echo "Current published_at: " . ($post->published_at ? $post->published_at->format('Y-m-d H:i:s') : 'NULL') . "\n";
        
        // Update the post to be published
        $post->is_published = true;
        
        // If published_at is in the future, set it to now
        if (!$post->published_at || $post->published_at > now()) {
            $post->published_at = now();
        }
        
        $post->save();
        
        echo "Post updated successfully!\n";
        echo "New status: is_published = true\n";
        echo "New published_at: " . $post->published_at->format('Y-m-d H:i:s') . "\n";
    } else {
        echo "No announcement post found.\n";
    }
} else {
    echo "No announcement category found.\n";
}

echo "\nDone.\n";
