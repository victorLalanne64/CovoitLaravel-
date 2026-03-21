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
                abort(403, "Visualisation interdite : cette voiture a 8 places ou plus.");
            }
        }
        return $next($request);
    }
}
