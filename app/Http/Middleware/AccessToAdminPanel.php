<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AccessToAdminPanel
{
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->hasAccessToAdminPanel()) {
            return $next($request);
        }

        return redirect()->route('admin.login')->withErrors(['password' => 'Доступ запрещён.']);
    }
}