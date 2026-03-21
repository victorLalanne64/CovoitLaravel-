<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{


    public function show(string $id)
    {
        $voiture = Voiture::with(['proprietaires' => function($q) {
            $q->withCount('voitures');
        }])->findOrFail($id);
        return view('voitures.show', compact('voiture'));
    }


}