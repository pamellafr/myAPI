<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // Verifica se o usuário está autenticado
        if (!Auth::guard($guard)->check()) {
            // Redireciona para a página de login, se não autenticado
            return redirect('login'); // Mude para uma resposta JSON se for uma API
        }

        // Se o usuário estiver autenticado, continua com a requisição
        return $next($request);
    }
}
