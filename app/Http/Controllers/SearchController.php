<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $usersearch = $request->input('q');

        $users = User::query()
            ->when($usersearch, fn($q) => $q->searchUser($usersearch))
            ->paginate(12)
            ->withQueryString();

            return view('search.index', compact('users', 'usersearch'));

    }
}
