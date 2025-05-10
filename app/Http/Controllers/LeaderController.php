<?php

namespace App\Http\Controllers;

use App\Models\Leader;
use Illuminate\Http\Request;

class LeaderController extends Controller
{
    /**
     * Display a listing of the leaders.
     */
    public function index()
    {
        $leaders = Leader::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('leaders.index', compact('leaders'));
    }
}
