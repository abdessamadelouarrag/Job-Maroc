<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserController extends Controller
{
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096'
        ]);

        $user = Auth::user();

        // Upload avatar
        if ($request->hasFile('image')) {
            // Delete old
            if ($user->image_url && Storage::disk('public')->exists($user->image_url)) {
                Storage::disk('public')->delete($user->image_url);
            }

            // Upload new
            $user->image_url = $request->file('image')->store('profiles/avatars', 'public');
        }

        // Upload banner
        if ($request->hasFile('banner')) {
            // Delete old
            if ($user->banner_url && Storage::disk('public')->exists($user->banner_url)) {
                Storage::disk('public')->delete($user->banner_url);
            }

            // Upload new
            $user->banner_url = $request->file('banner')->store('profiles/banners', 'public');
        }

        $user->save();

        return redirect()->back()->with('success', 'Images uploaded successfully!');
    }
    public function show(User $user)
    {
        return view('profile.show', compact('user'));
    }
}
