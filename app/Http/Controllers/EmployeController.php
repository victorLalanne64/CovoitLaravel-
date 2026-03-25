<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="Employes",
 *     description="Gestion des employés"
 * )
 */
class EmployeController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/employes",
     *     tags={"Employes"},
     *     summary="Liste tous les employés",
     *     @OA\Response(
     *         response=200,
     *         description="Liste des employés"
     *     )
     * )
     */
    public function apiIndex()
    {
        $employes = Employe::all();
        return response()->json($employes);
    }


    /**
     * @OA\Get(
     *     path="/api/employes/{id}",
     *     tags={"Employes"},
     *     summary="Afficher un employé",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de l'employé",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Détail de l'employé"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Employé non trouvé"
     *     )
     * )
     */
    public function apiShow(string $id)
    {
        $employe = Employe::findOrFail($id);
        $nbVoitures = $employe->voitures()->count();
        if ($nbVoitures === 0) {
            $statut = "Pas conducteur";
        } elseif ($nbVoitures === 1) {
            $statut = "Conducteur";
        } else {
            $statut = "Conducteur très actif";
        }
        return response()->json([
            'employe' => $employe,
            'nbVoitures' => $nbVoitures,
            'statut' => $statut
        ]);
    }

    
    public function index()
    {
        $employes = Employe::all();
        return view('employes.index', compact('employes'));
    }

    // Affiche le formulaire pour ajouter une voiture à un employé
    public function formulaireAjoutVoiture(string $id)
    {
        $employe = Employe::findOrFail($id);
        return view('employes.formulaire_ajout_voiture', compact('employe'));
    }

    // Traite l'ajout d'une voiture pour un employé
    public function ajouterVoiture(Request $request, string $id)
    {
        $employe = Employe::findOrFail($id);
        $request->validate([
            'modele' => 'required|string|max:255',
            'nb_places' => 'required|integer|min:1',
        ]);
        $voiture = $employe->voitures()->create([
            'modele' => $request->input('modele'),
            'nb_places' => $request->input('nb_places'),
        ]);
        return redirect()->route('employes.show', $employe->id)->with('success', 'Voiture ajoutée avec succès.');
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

    // Ajout alias pour la route POST /employes/{id}/verify
    public function verify(Request $request, string $id)
    {
        return $this->verifierModele($request, $id);
    }


}