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
            /* REVIEW - kľudne použi throw new Exception('Unauthorized', 401), keď už ide o error tak realne hoď error (exception)
            A inak super že používaš správne error codes (401 zlý input), to je vlastnosť, ktorú by si si mal udržať :DD */
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $request->user = $user;

        return $next($request);
    }
}
