<?php

namespace AppUser\User\Middleware;

use Closure;
use AppUser\User\Services\AuthService;

class GuestMiddleware
{
    public function handle($request, Closure $next)
    {
        $token = $request->header('Authorization');

        $user = AuthService::getAuthenticatedUser($token);

        if ($user) {
            return response()->json(['error' => 'Already authenticated'], 403);
        }

        return $next($request);
    }
}
