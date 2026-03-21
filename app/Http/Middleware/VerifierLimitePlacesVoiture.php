<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Voiture;

class VerifierLimitePlacesVoiture
{
    public function handle(Request $request, Closure $next)
    {
        $voiture = $request->route('id') ? Voiture::find($request->route('id')) : null;
        if ($voiture instanceof Voiture) {
            if ($voiture->nb_places < 8) {
                return $next($request);
            } else {
                // Trouver le propriétaire principal (premier employé lié)
                $employe = $voiture->proprietaires()->first();
                if ($employe) {
                    return redirect()->route('employes.show', $employe->id)
                        ->with('bus_error', 'Visualisation des bus en cours');
                } else {
                    return redirect()->back()->with('bus_error', 'Visualisation des bus en cours');
                }
            }
        }
        return $next($request);
    }
}
