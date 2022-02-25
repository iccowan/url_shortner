<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AuthenticateLoggedIn
{
    public function handle($request, Closure $next) {
        if (! Auth::check())
            return redirect('/login')->with('error', 'Please log in to continue');

        return $next($request);
    }
}
