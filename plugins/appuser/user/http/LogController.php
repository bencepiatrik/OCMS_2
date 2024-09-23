<?php

namespace AppUser\User\Http;

use Backend\Classes\Controller;
use Illuminate\Http\Request;
use AppUser\User\Models\Logs;
use AppUser\User\Models\Users;


class LogController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user;

        if ($user->is_admin) {
            $logs = Logs::all();
        } else {
            $logs = Logs::where('user_id', $user->id)->get();
        }
        return response()->json($logs);
    }
}
