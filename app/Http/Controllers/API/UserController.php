<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function checkState()
    {
        if(Auth::check()) {
            $user = (Auth::user()->lockStatus == 'online') ? Auth::user()->status : Auth::user()->lockStatus;
            return response()->json($user);
        }

    }

    public function checkStateWithID($id)
    {
        $user = User::findOrFail($id);
        $data = ($user->lockStatus == 'online') ? $user->status : $user->lockStatus;
        return response()->json($data);
    }
}