<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use App\Models\Offer; //

class DashboardController extends Controller
{
    public function index()
    {
        $requests = FriendRequest::where('receiver_id', auth()->id())
            ->where('status', 'pending')
            ->with('sender')
            ->latest()
            ->get();

        return view('dashboard', compact('requests'));
    }
}
