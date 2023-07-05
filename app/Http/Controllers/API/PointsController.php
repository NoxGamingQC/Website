<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ApiKey;
use App\Points;
use App\User;
use Auth;
use App;

class PointsController extends Controller
{
    public function getMinecraftPoints($userUUID)
    {
        $user = User::where('minecraft_uuid', '=', $userUUID)->first();
        if($user) {
            $points = Points::getTotalPoints($user->id);

            return response()->json($points);
        }
        abort(403);
    }

    public function addMinecraftPoints(Request $request, $userUUID, $ApiKey)
    {
        $user = User::where('minecraft_uuid', '=', $userUUID)->first();
        $isAuthorizedAPI = ApiKey::where('key', '=', $ApiKey)->first();
        
        if($user && $isAuthorizedAPI) {
            $points = new Points;
            $points->UserID = $user->id;
            $points->Quantity = $request->quantity;
            $points->Comment = $request->comment;
            $points->save();
        }
        abort(403);
    }
}