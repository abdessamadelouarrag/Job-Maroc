<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FriendRequest;
use Illuminate\Http\Request;

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
}
