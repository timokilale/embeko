<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Download;
use App\Models\Event;
use App\Models\ExamResult;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
        // Get statistics
        $stats = [
            'posts' => Post::count(),
            'events' => Event::count(),
            'downloads' => Download::count(),
            'examResults' => ExamResult::count(),
        ];

        // Get recent posts
        $recentPosts = Post::with('category')
            ->latest()
            ->take(5)
            ->get();

        // Get upcoming events
        $upcomingEvents = Event::upcoming()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentPosts', 'upcomingEvents'));
    }
}
