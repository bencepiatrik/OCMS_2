<?php

namespace AppUser\User\Controllers;

use Backend\Classes\Controller;
use Illuminate\Http\Request;
use AppUser\User\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use AppUser\User\Models\Log;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|unique:appuser_users',
            'password' => 'required|string',
        ]);

        $user = new User();
        $user->username = $data['username'];
        $user->password = $data['password'];
        $user->token = Str::random(60);
        $user->save();

        Log::create([
            'user_id' => $user->id,
            'action' => 'User registered',
        ]);

        return response()->json(['message' => 'User registered successfully', 'token' => $user->token],201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['username', 'password']);

        $user = User::where('username', $credentials['username'])->first();

        Log::create([
            'user_id' => $user->id,
            'action' => 'User logged in',
        ]);

        if ($user && Hash::check($credentials['password'], $user->password)) {
            return response()->json(['message' => 'Login successful', 'token' => $user->token]);
        } else {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
    }
}
