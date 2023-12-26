<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserTypeMiddleware
{
    public function handle(Request $request, Closure $next, $type)
    {
        $user = $request->user();

        if ($user && $user->user_type === $type) {
            return $next($request);
        }

        return redirect('/login')->with('error', 'Unauthorized. Please log in.');
    }
}

