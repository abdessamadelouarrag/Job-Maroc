<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OffreController extends Controller
{
    public function show(){
        return view('Offre.newOffre');
    }

    public function storeOffer()
    {
        // code...
    }
}
