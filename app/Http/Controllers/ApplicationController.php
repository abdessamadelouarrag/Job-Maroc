<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(int $id)
    {
        $userId = auth()->id();

        $offre = Offre::findOrFail($id);

        $already = Application::where('id_user', $userId)
            ->where('id_offre', $offre->id)
            ->exists();

        if ($already) {
            return back()->with('error', 'Vous avez déjà postulé à cette offre.');
        }

        Application::create([
            'id_user'  => $userId,
            'id_offre' => $offre->id,
            'status'   => 'applied',
        ]);

        return back()->with('success', 'Postulation envoyée');
    }

    public function checkOffre(int $id): bool
{
    $userId = auth()->id();

    return Application::where('id_user', $userId)
        ->where('id_offre', $id)
        ->exists();
}

}
