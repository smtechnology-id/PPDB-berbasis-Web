<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Pengumuman;

class ShareAnnouncementCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $announcementCount = Pengumuman::count();
        view()->share('announcementCount', $announcementCount);

        return $next($request);
    }
}