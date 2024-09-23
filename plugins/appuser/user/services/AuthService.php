<?php

namespace AppUser\User\Services;

use AppUser\User\Models\Users;

class AuthService
{
    public static function getAuthenticatedUser($token)
    {
        return Users::where('token', $token)->first();
    }
}
