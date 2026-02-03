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
        return view('profile.edit', [
            'user' => $request->user(),
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
        $data = $request->validate([
            'experience_name' => 'required|string|max:255',
            'experience_city' => 'nullable|string|max:255',
            'experience_start' => 'required|date',
            'experience_end' => 'nullable|date|after_or_equal:experience_start',
        ]);

        $data['id_user'] = auth()->id();

        Experiences::create($data);

        return back()->with('success', 'Experience added');
    }


    public function storeEducation(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $request->user()->educations()->create($request->all());

        return back()->with('success', 'Education added');
    }

    public function storeSkill(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $request->user()->skills()->create($request->all());

        return back()->with('success', 'Skill added');
    }


}
