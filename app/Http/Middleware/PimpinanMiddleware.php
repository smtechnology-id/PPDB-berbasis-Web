<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PimpinanMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->role !== 'pimpinan') {
            return redirect('/')->with('error', "You don't have pimpinan access.");
        }
        return $next($request);
    }
}
