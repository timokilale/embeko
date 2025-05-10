<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Post;
use App\Models\SchoolInfo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        // Remove try-catch to see actual errors
        $latestPosts = Post::with('category')
            ->published()
            ->latest('published_at')
            ->take(3)
            ->get();

        $upcomingEvents = Event::upcoming()
            ->take(3)
            ->get();

        $schoolInfo = SchoolInfo::getInfo();

        return view('home', compact('latestPosts', 'upcomingEvents', 'schoolInfo'));
    }

    /**
     * Display the about page.
     */
    public function about()
    {
        $schoolInfo = SchoolInfo::getInfo();
        return view('about', compact('schoolInfo'));
    }

    /**
     * Display the contact page.
     */
    public function contact()
    {
        $schoolInfo = SchoolInfo::getInfo();
        return view('contact', compact('schoolInfo'));
    }

    /**
     * Display the admissions page.
     */
    public function admissions()
    {
        $schoolInfo = SchoolInfo::getInfo();
        return view('admissions', compact('schoolInfo'));
    }

    /**
     * Display the academics page.
     */
    public function academics()
    {
        $schoolInfo = SchoolInfo::getInfo();
        return view('academics', compact('schoolInfo'));
    }

    /**
     * Display the fees page.
     */
    public function fees()
    {
        $schoolInfo = SchoolInfo::getInfo();
        return view('fees', compact('schoolInfo'));
    }

    /**
     * Display the application page.
     */
    public function apply()
    {
        $schoolInfo = SchoolInfo::getInfo();
        return view('apply', compact('schoolInfo'));
    }
}
