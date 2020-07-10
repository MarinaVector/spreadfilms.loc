<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class SetCompanyPublicPrivateFolders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            config(['filesystems.disks.company-public.root' => public_path().'/userfiles/companies/' . Auth::user()->company()->id . '/public/']);
            config(['filesystems.disks.company-private.root' => public_path().'/userfiles/companies/' . Auth::user()->company()->id . '/private/' . Auth::user()->id]);
        }

        return $next($request);
    }
}
