<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Experiences;
use App\Models\Formations;
use App\Models\Skills;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        return view('profile.edit', [
            'user' => $user,
            'experiences' => $user->experiences()->orderBy('date_start', 'desc')->get(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function storeExperience(Request $request)
    {
        // dd($request->all());

        $data = $request->validate([
            'name_of_experience' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'date_start' => 'required|date|after_or_equal:date_start',
            'date_end' => 'nullable|date|after_or_equal:date_start',
        ]);

        $data['id_user'] = auth()->id();

        Experiences::create($data);

        return back()->with('success', 'Experience added');
    }



    public function storeEducation(Request $request)
    {
        $data = $request->validate([
            'name_of_formation' => 'required|string|max:255',
            'date_start' => 'required|date',
            'date_end' => 'nullable|date|after_or_equal:date_start',
        ]);

        $data['id_user'] = auth()->id();

        Formations::create($data);

        return back()->with('success', 'Education added');
    }


    public function storeSkill(Request $request)
    {
        $data = $request->validate([
            'name_skills' => 'required|string|max:100',
        ]);

        $data['id_user'] = auth()->id();

        Skills::create($data);

        return back()->with('success', 'Skill added');
    }




}
