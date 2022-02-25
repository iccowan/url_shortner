<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AuthenticateLoggedOut
{
    public function handle($request, Closure $next) {
        if (Auth::check())
            return redirect()->back();

        return $next($request);
    }
}
