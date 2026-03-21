<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'possede.voiture' => \App\Http\Middleware\PossedeVoitureMiddleware::class,
        'appartient.campus' => \App\Http\Middleware\AppartientCampusMiddleware::class,
        'limite.places.voiture' => \App\Http\Middleware\LimitePlacesVoitureMiddleware::class,
    ];
}
