<?php

namespace App\Http\Controllers\NoxBOT;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Points;
use App\BotLists;

class PointSystemController extends Controller
{
    public function addPoints(Request $request)
    {
        $bot = BotLists::where('BotID', $request->botID)->first();
        return ($bot->Token == $request->websiteToken);
        if($bot) {
            $isBotValid = ($bot->Token == $request->websiteToken);
            if($isBotValid && $bot->Environement === "production") {
                $user = User::where('DiscordID', $request->userID)->first();
                if($user) {
                    $userID = $user->id;
                }
                $points = new Points();
                $points->UserID = $userID;
                $points->Quantity = ($request->points * $request->mulitplier);
                $points->Comment = $request->comment;
                $points->save();
                return 0;
            } else if ($isBotValid && $bot->Environement === "development") {
                return 0;
            }
        }
        abort(403);
    }
}