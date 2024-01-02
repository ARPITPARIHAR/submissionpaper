<?php

namespace App\Http\Middleware;

use Closure;

class ClientMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && in_array(auth()->user()->user_type, ['client', 'admin'])) {
            return $next($request);
        }

        abort(403, 'Unauthorized access for clients');
    }
}

