<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\VehiculeController;

// Route par défaut : redirige vers la liste des employés
Route::get('/', function () {
    return redirect()->route('employes.index');
});

// --- Routes pour les Employés ---

// Affiche la liste de tous les employés (Vue n°1 - Figure 1.1)
Route::get('/employes', [EmployeController::class, 'index'])->name('employes.index');


// Affiche le profil d'un employé spécifique (Vue n°2 - Figure 1.2) avec vérification de possession de voiture et d'appartenance à un campus
Route::get('/employes/{id}', [EmployeController::class, 'show'])
    ->middleware(['verifier.appartenance.campus', 'verifier.possession.voiture'])
    ->name('employes.show');

// Formulaire pour ajouter une voiture à un employé (vue de redirection)
Route::get('/employes/{id}/ajouter-voiture', [EmployeController::class, 'formulaireAjoutVoiture'])->name('employes.formulaire_ajout_voiture');
Route::post('/employes/{id}/ajouter-voiture', [EmployeController::class, 'ajouterVoiture'])->name('employes.ajouter_voiture');

// Gère la logique de vérification "YES/NO" du modèle de voiture
Route::post('/employes/{id}/verify', [EmployeController::class, 'verify'])->name('employes.verify');


// --- Routes pour les Voitures ---

// Affiche les détails d'une voiture et ses propriétaires (Vue n°3 - Figure 1.3) 
Route::get('/voitures/{id}', [VehiculeController::class, 'show'])
    ->middleware('verifier.limite.places.voiture')
    ->name('voitures.show');