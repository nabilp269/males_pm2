<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsUser
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'user') {
            return $next($request);
        }

        return redirect('/')->with('error', 'Hanya user yang dapat mengakses halaman ini.');
    }
}

