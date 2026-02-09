<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;
use App\Models\MyOffre;
use Illuminate\Support\Facades\Auth;

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

    // afficher les offres
    public function allOffer()
    {

        $offres = Offre::latest()->get();

        return view('dashboard', compact('offres'));
    }

    public function all(Offre $offre)
    {
        $alreadyApplied = false;

        if (Auth::check()) {
            $alreadyApplied = MyOffre::where('id_user', Auth::id())
                ->where('id_offre', $offre->id)
                ->where('status', 'applied') // optional
                ->exists();
        }

        return view('offres.show', compact('offre', 'alreadyApplied'));
    }

    public function postuler(Offre $offre)
{
    // منع التكرار
    $exists = MyOffre::where('id_user', Auth::id())
        ->where('id_offre', $offre->id)
        ->exists();

    if ($exists) {
        return back()->with('error', 'Vous avez déjà postulé.');
    }

    MyOffre::create([
        'id_user'  => Auth::id(),
        'id_offre' => $offre->id,
        'status'   => 'applied',
    ]);

    return back()->with('success', 'Postulation envoyée.');
}
}
