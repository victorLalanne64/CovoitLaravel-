<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Voiture;

class LimitePlacesVoitureMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $voiture = $request->route('voiture');
        if ($voiture instanceof Voiture) {
            if ($voiture->nb_places < 8) {
                return $next($request);
            } else {
                return redirect()->back()->with('error', 'Visualisation des bus en cours');
            }
        }
        return $next($request);
    }
}
