<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\VoitureController;

// Route par défaut : redirige vers la liste des employés
Route::get('/', function () {
    return redirect()->route('employes.index');
});

// --- Routes pour les Employés ---

// Affiche la liste de tous les employés (Vue n°1 - Figure 1.1)
Route::get('/employes', [EmployeController::class, 'index'])->name('employes.index');

// Affiche le profil d'un employé spécifique (Vue n°2 - Figure 1.2)
Route::get('/employes/{id}', [EmployeController::class, 'show'])->name('employes.show');

// Gère la logique de vérification "YES/NO" du modèle de voiture
Route::post('/employes/{id}/verify', [EmployeController::class, 'verify'])->name('employes.verify');


// --- Routes pour les Voitures ---

// Affiche les détails d'une voiture et ses propriétaires (Vue n°3 - Figure 1.3)
Route::get('/voitures/{id}', [VehiculeController::class, 'show'])->name('voitures.show');