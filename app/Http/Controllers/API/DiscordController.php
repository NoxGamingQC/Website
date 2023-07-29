<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DiscordUsers;
use Carbon\Carbon;
use App\ApiKey;
use App;

class DiscordController extends Controller
{
    public function update(Request $request) {
        $getApp = ApiKey::where('key', '=', $request->website_token)->first();
        if($getApp) {
            foreach($request->users as $discordID => $discordUsername) {
                $existingDiscordUser = DiscordUsers::where('discord_id', '=', $discordID)->first();
                if($existingDiscordUser) {
                    if($existingDiscordUser->name !== $discordUsername) {
                        $existingDiscordUser->name = $discordUsername;
                        $existingDiscordUser->save();
                        return;
                    }
                } else {
                    $discordUser = new DiscordUsers;
                    $discordUser->discord_id = $discordID;
                    $discordUser->name = $discordUsername;
                    $discordUser->save();
                    return;
                }
            }
        }
        abort(403);
    }
}