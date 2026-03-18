<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function index()
    {
        $employes = Employe::all();
        return view('employes.index', compact('employes'));
    }

    public function show(string $id)
    {
        $employe = Employe::findOrFail($id);
        $nbVoitures = $employe->voitures()->count();

        if ($nbVoitures === 0) {
            $statut = "Pas conduteur";
        } elseif ($nbVoitures === 1) {
            $statut = "Conducteur";
        } else {
            $statut = "Conducteur très actif";
        }

        return view('employes.show', compact('employe', 'nbVoitures', 'statut'));
    }

    public function verifierModele(Request $request, string $id)
    {
        $employe = Employe::findOrFail($id);
        $modele = $request->input('modele');
        $possede = $employe->voitures()->where('modele', $modele)->exists();
        $result = $possede ? 'YES' : 'NO';

        return redirect()->route('employes.show', $id)->with('result', $result);
    }

    public function create() {}

    public function store(Request $request) {}

    public function edit(string $id) {}

    public function update(Request $request, string $id) {}

    public function destroy(string $id) {}
}