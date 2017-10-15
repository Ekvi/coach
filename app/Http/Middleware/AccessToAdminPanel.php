<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AccessToAdminPanel
{
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->isAccessToAdminPanel()) {
            return $next($request);
        }

        return redirect('login');
    }
}