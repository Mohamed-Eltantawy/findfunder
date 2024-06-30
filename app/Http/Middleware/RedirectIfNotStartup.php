<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotStartup
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('startup')->check()) {
            return redirect('/startup/login');
        }

        return $next($request);
    }
}
