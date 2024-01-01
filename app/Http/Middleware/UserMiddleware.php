<?php

namespace App\Http\Middleware;

use Closure;

class UserMiddleware
{
    public function handle($request, Closure $next)
    {
        // Your logic for user middleware
        if (auth()->check() && auth()->user()->user_type == 'user') {
            return $next($request);
        }

        abort(403, 'Unauthorized access for users');
    }
}
