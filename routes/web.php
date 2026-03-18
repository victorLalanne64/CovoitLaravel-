<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\VehiculeController;

Route::get('/', function () {
    return redirect()->route('employes.index');
});

Route::resource('employes', EmployeController::class);
Route::resource('vehicules', VehiculeController::class);
Route::post('/employes/{id}/verifier', [EmployeController::class, 'verifierModele'])->name('employes.verifier');