<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Employe;

class VerifierPossessionVoiture
{
    public function handle(Request $request, Closure $next)
    {
        $employe = $request->route('id') ? Employe::find($request->route('id')) : null;
        if ($employe instanceof Employe) {
            if ($employe->voitures()->count() > 0) {
                return $next($request);
            } else {
                return redirect()->route('employes.formulaire_ajout_voiture', ['id' => $employe->id]);
            }
        }
        return $next($request);
    }
}
