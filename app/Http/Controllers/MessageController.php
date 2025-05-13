<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->paginate(10);
        return view('admin.messages.index', compact('messages'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        Message::create($validated);
        return redirect()->back()->with('success','Thank you for contacting us, we will get back at you as soon as possible');
    }

    public function show(Message $message)
    {
        $message->read_at = now();
        $message->save();
        return view('admin.messages.show', compact('message'));
    }
}
