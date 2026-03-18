<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function index() {}

    public function show(string $id)
    {
        $voiture = Voiture::findOrFail($id);
        $nbVoitureEmploye = $voiture->employe->voitures()->count();
        
        return view('vehicules.show', compact('voiture', 'nbVoitureEmploye'));
    }

    public function create() {}

    public function store(Request $request) {}

    public function edit(string $id) {}

    public function update(Request $request, string $id) {}

    public function destroy(string $id) {}
}