<?php

namespace App\Http\Controllers\NoxBOT;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BotTwitchLivesController extends Controller
{
    public function getTwitchLives()
    {
        $twitchLives = [];
        /*foreach (TwitchLives::orderBy('ID')->get() as $key => $twitchLive) {
            array_push($twitchLives, [
                'serverID' => $twitchLive->ServerID,
                'channelID' => $twitchLive->ChannelID,
                'userID' => $twitchLive->UserID,
                'isLive' => $twitchLive->isLive,
                'custom_message' => $twitchLive->CustomMessage
            ]);
        }*/
        return response()->json($twitchLives);
    }
}
