<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Post;
use App\Models\SchoolInfo;
use App\Models\WelcomeMessage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        // Remove try-catch to see actual errors
        $news = Post::whereHas('category', function ($query) {
            $query->where('slug', 'news');
        })
            ->latest()
            ->first();

        $upcomingEvents = Event::upcoming()
            ->take(3)
            ->get();

        $schoolInfo = SchoolInfo::getInfo();

        // Get the active welcome message
        $welcomeMessage = WelcomeMessage::getActive();

        $announcement = Post::whereHas('category', function ($query) {
            $query->where('slug', 'announcements');
        })
            ->latest()
            ->first();


        return view('home', compact('news', 'upcomingEvents', 'schoolInfo', 'welcomeMessage', 'announcement'));
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
