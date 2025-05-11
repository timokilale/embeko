<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewsletterController extends Controller
{
    /**
     * Subscribe to the newsletter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters,email',
        ]);

        // Create a new newsletter subscription
        Newsletter::create([
            'email' => $request->email,
        ]);

        // Flash a success message
        Session::flash('success', 'Thank you for subscribing to our newsletter!');

        // Redirect back to the previous page
        return back();
    }
}
