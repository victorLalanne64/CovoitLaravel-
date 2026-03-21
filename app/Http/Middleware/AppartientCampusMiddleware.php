<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Employe;

class AppartientCampusMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $employe = $request->route('employe');
        if ($employe instanceof Employe) {
            if ($employe->campuses()->count() > 0) {
                return $next($request);
            } else {
                abort(403, "Cet employé n'appartient à aucun campus.");
            }
        }
        return $next($request);
    }
}
