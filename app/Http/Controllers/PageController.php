<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display the specified page.
     */
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->published()->with('sections')->firstOrFail();
        
        // Determine which view to use based on the page's layout
        $view = 'pages.' . $page->layout;
        
        // Check if the view exists, otherwise use a default view
        if (!view()->exists($view)) {
            $view = 'pages.default';
        }
        
        return view($view, compact('page'));
    }
}
