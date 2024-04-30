<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateApi
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('api')->check()) {
            return response()->json(['error' => 'Unauthorized. Token is missing or invalid.'], 401);
        }

        return $next($request);
    }
}