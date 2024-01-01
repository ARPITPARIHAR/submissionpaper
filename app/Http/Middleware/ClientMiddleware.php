<?php

namespace App\Http\Middleware;

use Closure;

class ClientMiddleware
{
    public function handle($request, Closure $next)
    {
        // Your logic for client middleware
        if (auth()->check() && auth()->user()->user_type == 'client') {
            return $next($request);
        }

        abort(403, 'Unauthorized access for clients');
    }
}

