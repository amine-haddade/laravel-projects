<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
    if (auth()->check() && auth()->user()->type === 'user') {
        return $next($request);
    }
    return redirect('/'); // Rediriger si l'utilisateur n'a pas le bon rôle
    }

}
