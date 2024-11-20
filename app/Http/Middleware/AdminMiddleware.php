<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el usuario está autenticado y tiene el rol de administrador
        //if ($request->user() && $request->user()->role === 'admin') 
        if (auth()->check() && auth()->user()->role !== 'admin'){
            return $next($request); // Continuar con la solicitud
        }

        // Si no es administrador, redirigir o lanzar un error 403
        abort(403, 'Acceso denegado. Este recurso es solo para administradores.');
    }
}
