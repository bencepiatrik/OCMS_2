<?php

namespace AppUser\User\Middleware;

use Closure;
use AppUser\User\Services\AuthService;

class AuthMiddleware
{
    public function handle($request, Closure $next)
    {
        $token = $request->header('Authorization');

        $user = AuthService::getAuthenticatedUser($token);

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $request->user = $user;

        return $next($request);
    }
}
