<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DiscordServerConfig;
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

    public function updateServer(Request $request) {
        $getApp = ApiKey::where('key', '=', $request->website_token)->first();
        if($getApp) {
            if($request->servers) {
                foreach($request->servers as $discordID => $discordServer) {
                    $existingServer = DiscordServerConfig::where('discord_id', '=', $discordID);
                    if($existingServer) {
                        if($existingServer->name !== $discordServer['name']) {
                            $existingServer->name = $discordServer['name'];
                            $existingServer->save();
                        }
                        if($existingServer->avatar_url !== $discordServer['avatar_url']) {
                            $existingServer->avatar_url = $discordServer['avatar_url'];
                            $existingServer->save();
                        }
                    } else {
                        $newDiscordServer = new DiscordServerConfig();
                        $newDiscordServer->discord_id = $discordID;
                        $newDiscordServer->name = $discordServer['name'];
                        $newDiscordServer->avatar_url = $discordServer->avatar_url;
                        $newDiscordServer->save();
                        return;
                    }
                }
            }
        }
        abort(403);
    }

    public function getServerConfig($id) {
        $server = DiscordServerConfig::where('discord_id', '=', $id);
        if($server) {
            return  response()->json([
                'id' => $server->discord_id,
                'avatar_url' => $server->avatar_url,
                'prefix' => $server->prefix,
                'can_receive_points' => $server->can_receive_points,
                'name' => $server->name
            ]);
        }
        abort(404);
    }
}