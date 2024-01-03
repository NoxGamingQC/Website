<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\DiscordUsers;
use Carbon\Carbon;
use App\Model\API\ApiKey;
use App\Model\Points;
use App\Model\User;

class PointsController extends Controller
{
    public function addPoints(Request $request) {
        $getApp = ApiKey::where('key', '=', $request->website_token)->first();
        if($getApp) {
            if($request->discord_id) {
                $lastEntry = Points::where('key_id', '=', $getApp->id)->orderBy('created_at', 'DESC')->first();
                $canReceivePoints = false;
                if ($lastEntry) {
                    $now = Carbon::now();
                    $messageDate = Carbon::parse($lastEntry->created_at)->addMinutes(1);
                    if($messageDate->diffInMinutes($now) >= 1) {
                        $canReceivePoints = true;
                    }
                } else {
                    $canReceivePoints = true;
                }
                $userDiscordID = DiscordUsers::where('discord_id', '=', $request->discord_id)->first();
                if($userDiscordID) {
                    $user = User::where('discord_id', '=', $userDiscordID->id)->first();
                }
            } else {
                $canReceivePoints = true;
                $user = User::findOrFail($request->user_id);
            }
            
            if(isset($user) && $canReceivePoints) {
                $points = new Points;
                $points->UserID = $user->id;
                $points->Quantity = $request->multiplier ? ($request->points * $request->multiplier) : $request->points;
                $points->Comment = $request->comment;
                $points->key_id = $getApp->id;
                $points->save();
            }
        }
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