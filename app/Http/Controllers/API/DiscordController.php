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
            if($request->users) {
                foreach($request->users as $discordID => $discordUser) {
                    $existingDiscordUser = DiscordUsers::where('discord_id', '=', $discordID)->first();
                    if($existingDiscordUser) {
                        if($existingDiscordUser->name !== $discordUser['username']) {
                            $existingDiscordUser->name = $discordUser['username'];
                            $existingDiscordUser->save();
                        }
                        if($existingDiscordUser->avatar_url !== $discordUser['avatar_url']) {
                            $existingDiscordUser->avatar_url = $discordUser['avatar_url'];
                            $existingDiscordUser->save();
                        }
                        return;
                    } else {
                        $newDiscordUser = new DiscordUsers;
                        $newDiscordUser->discord_id = $discordID;
                        $newDiscordUser->name = $discordUser['username'];
                        $newDiscordUser->avatar_url = $discordUser->avatar_url;
                        $newDiscordUser->save();
                        return;
                    }
                }
            }
        }
        abort(403);
    }
}