<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FriendRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $usersearch = $request->get('q');

        $users = User::query()
            ->when($usersearch, function ($query) use ($usersearch) {
                $query->where('name', 'like', "%{$usersearch}%")
                      ->orWhere('email', 'like', "%{$usersearch}%");
            })
            ->paginate(10);

        // map: [user_id => true] if pending/accepted exists
        $existsMap = [];

        if (Auth::check()) {
            $me = Auth::id();

            $ids = $users->pluck('id')->filter(fn ($id) => $id != $me)->values();

            if ($ids->isNotEmpty()) {
                $related = FriendRequest::query()
                    ->whereIn('status', ['pending', 'accepted'])
                    ->where(function ($q) use ($me, $ids) {
                        $q->where(function ($q2) use ($me, $ids) {
                            $q2->where('sender_id', $me)->whereIn('receiver_id', $ids);
                        })->orWhere(function ($q2) use ($me, $ids) {
                            $q2->where('receiver_id', $me)->whereIn('sender_id', $ids);
                        });
                    })
                    ->get(['sender_id', 'receiver_id']);

                foreach ($related as $fr) {
                    $otherId = ($fr->sender_id == $me) ? $fr->receiver_id : $fr->sender_id;
                    $existsMap[$otherId] = true;
                }
            }
        }

        return view('search.index', compact('users', 'usersearch', 'existsMap'));
    }
}
