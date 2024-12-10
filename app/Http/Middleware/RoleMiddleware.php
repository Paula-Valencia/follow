<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica si existe un usuario en la sesión
        $user = $request->session()->get('user');

        // Verifica si no tiene un rol permitido
        if (!isset($user['id_role']) || ($user['id_role'] != 1 && $user['id_role'] != 2)) {
            // Redirige al inicio si el rol no es válido
            return redirect('/')->with('error', 'Acceso denegado.');
        }

        // Si el rol es válido, continúa con la solicitud
        return $next($request);
    }
}