<?php

namespace AppUser\User\Controllers;

use Backend\Classes\Controller;
use Illuminate\Http\Request;
use AppUser\User\Models\Log;
use AppUser\User\Models\User;


class LogController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user;

        if ($user->is_admin) {
            $logs = Log::all();
        } else {
            $logs = Log::where('user_id', $user->id)->get();
        }
        return response()->json($logs);
    }
}
