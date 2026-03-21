<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Employe;

class PossedeVoitureMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $employe = $request->route('employe');
        if ($employe instanceof Employe) {
            if ($employe->voitures()->count() > 0) {
                return $next($request);
            } else {
                return redirect()->route('employes.formulaireAjoutVoiture', ['employe' => $employe->id]);
            }
        }
        return $next($request);
    }
}
