<?php

namespace App\Http\Middleware;

use Closure;

class UserMiddleware
{
    public function handle($request, Closure $next)
    {
        
        if (auth()->check() && in_array(auth()->user()->user_type, ['user', 'admin'])) {
            return $next($request);
        }

        abort(403, 'Unauthorized access for users');
    }
}
