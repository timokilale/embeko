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
        // Redirect to the dynamic about page
        return redirect()->route('page.show', 'about-us');
    }

    /**
     * Display the contact page.
     */
    public function contact()
    {
        // Redirect to the dynamic contact page
        return redirect()->route('page.show', 'contact-us');
    }

    /**
     * Display the admissions page.
     */
    public function admissions()
    {
        // Redirect to the dynamic admissions page
        return redirect()->route('page.show', 'admissions');
    }

    /**
     * Display the academics page.
     */
    public function academics()
    {
        // Redirect to the dynamic academics page
        return redirect()->route('page.show', 'academics');
    }

    /**
     * Display the fees page.
     */
    public function fees()
    {
        // Redirect to the dynamic fees page
        return redirect()->route('page.show', 'fees');
    }

    /**
     * Display the application page.
     */
    public function apply()
    {
        // Redirect to the dynamic admissions page
        return redirect()->route('page.show', 'admissions');
    }
}
