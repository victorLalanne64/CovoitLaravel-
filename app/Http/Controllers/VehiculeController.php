<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="Vehicules",
 *     description="Gestion des véhicules"
 * )
 */
class VehiculeController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/vehicules/{id}",
     *     tags={"Vehicules"},
     *     summary="Afficher un véhicule",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID du véhicule",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Détail du véhicule"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Véhicule non trouvé"
     *     )
     * )
     */
    public function apiShow(string $id)
    {
        $voiture = Voiture::with(['proprietaires' => function($q) {
            $q->withCount('voitures');
        }])->findOrFail($id);
        return response()->json($voiture);
    }


    public function show(string $id)
    {
        $voiture = Voiture::with(['proprietaires' => function($q) {
            $q->withCount('voitures');
        }])->findOrFail($id);
        return view('voitures.show', compact('voiture'));
    }


}