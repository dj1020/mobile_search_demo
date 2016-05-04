<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class MustBeAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        
        if ($user && $user->hasPermission()) {
            return $next($request);
        }

        return abort(403, "You don't have admin permission to do it");
    }
}
