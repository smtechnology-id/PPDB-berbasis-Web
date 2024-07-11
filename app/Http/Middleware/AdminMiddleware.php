<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect('/')->with('error', "You don't have admin access.");
        }
        return $next($request);
    }
}
