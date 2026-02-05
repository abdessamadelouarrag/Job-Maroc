<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;

class OffreController extends Controller
{
    public function show()
    {
        return view('Offre.newOffre');
    }

    public function storeOffer(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'place'       => 'required|string|max:255',
            'type_offer'  => 'required|in:cdi,cdd,stage,freelance,alternance',
            'description' => 'required|string',
            'image_offer' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image_offer')) {
            $imagePath = $request->file('image_offer')->store(
                'offres',
                'public'
            );
        }

        Offre::create([
            'title'        => $request->title,
            'place'        => $request->place,
            'type_offer'   => $request->type_offer,
            'description'  => $request->description,
            'image_offer'  => $imagePath,
        ]);

        return redirect()
            ->route('offre.new')
            ->with('success', 'Offre créée avec succes!');
    }
}
