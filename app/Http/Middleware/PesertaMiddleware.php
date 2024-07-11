<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PesertaMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->role !== 'peserta') {
            return redirect('/')->with('error', "You don't have peserta access.");
        }
        return $next($request);
    }
}
