<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class FriendRequest extends Model
{
    protected $table = 'friend_requests';

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'status',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function scopeBetweenUsers($query, $userA, $userB)
    {
        return $query->where(function ($q) use ($userA, $userB) {
            $q->where('sender_id', $userA)->where('receiver_id', $userB);
        })->orWhere(function ($q) use ($userA, $userB) {
            $q->where('sender_id', $userB)->where('receiver_id', $userA);
        });
    }

    public function scopeMyRequestsFriendes($query)
    {
        return $query->where('receiver_id', Auth::id())
                     ->where('status', 'pending');
    }

}
