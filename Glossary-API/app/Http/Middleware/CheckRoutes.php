<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoutes
{

    /**
     * Las rutas que deben ser deshabilitadas.
     *
     * @var array
     */
    protected $disabledRoutes = [
        'register',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {

        $currentRoutes = $request->route()->getName();

        if($request->isMethod('GET'))
        {
            if(in_array($currentRoutes, $this->disabledRoutes))
            {
                abort(404);
            }
        }

        return $next($request);
    }
}
