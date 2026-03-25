
<?php
/**
 * @OA\Info(
 *     title="API Employés",
 *     version="1.0.0"
 * )
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\VehiculeController;

Route::get('/employes', [EmployeController::class, 'apiIndex']);
Route::get('/employes/{id}', [EmployeController::class, 'apiShow']);

Route::get('/vehicules/{id}', [VehiculeController::class, 'apiShow']);
