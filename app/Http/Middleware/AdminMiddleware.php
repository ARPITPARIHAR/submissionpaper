<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Your logic for admin middleware
        if (auth()->check() && auth()->user()->user_type == 'admin') {
            return $next($request);
        }

        abort(403, 'Unauthorized access for admins');
    }
}
