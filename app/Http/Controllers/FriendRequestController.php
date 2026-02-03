<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FriendRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendRequestController extends Controller
{
    public function store(User $user)
    {
        $senderId = auth()->id();

        $receiverId = $user->id;

        if ($senderId === $receiverId) {
            return back();
        }

        $exists = FriendRequest::where('sender_id', $senderId)
            ->where('receiver_id', $receiverId)
            ->where('status', 'pending')
            ->exists();

        if ($exists) {
            return back()->with('error', 'Demande déjà envoyée');
        }

        FriendRequest::create([
            'sender_id'   => $senderId,
            'receiver_id' => $receiverId,
            'status'      => 'pending',
        ]);

        return back()->with('success', 'Demande envoyée');
    }

    public function index()
    {
        $requests = FriendRequest::where('receiver_id', auth()->id())
            ->where('status', 'pending')
            ->with('sender')
            ->get();

        return view('friends.requests', compact('requests'));
    }

    public function show($id)
    {
        $profileUserId = (int) $id;
        $me = auth()->id();

        $exists = false;

        if (auth()->check() && $me !== $profileUserId) {
            $exists = FriendRequest::betweenUsers($me, $profileUserId)
                ->whereIn('status', ['pending', 'accepted'])
                ->exists();
        }

        return view('profile.show', compact('profileUserId', 'exists'));
    }

    public function allRequests()
    {
        $userId = auth()->id();

        $requests = FriendRequest::where('receiver_id', auth()->id())
        ->where('status', 'pending')
        ->with('sender')
        ->latest()
        ->get();

        return view('dashboard', compact('requests'));
    }

}
