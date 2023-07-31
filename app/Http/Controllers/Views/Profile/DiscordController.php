<?php

namespace App\Http\Controllers\Views\Profile;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\DiscordServerConfig;
use App\DiscordUsers;

class DiscordController extends Controller
{
    public function manageServer($language, $id)
    {
        $server = DiscordServerConfig::where('discord_id', '=', $id)->first();
        $owner = DiscordUsers::where('discord_id', '=', $server->owner)->first();
        return view('view.discord.server_management', [
            'id' => $server->discord_id,
            'avatar_url' => $server->avatar_url,
            'prefix' => $server->prefix,
            'can_receive_points' => $server->can_receive_points,
            'created_at' => Carbon::parse($server->created_at)->format('Y-m-d H:i'),
            'updated_at' => Carbon::parse($server->updated_at)->format('Y-m-d H:i'),
            'name' => $server->name,
            'owner_name' => $owner ? $owner->name : null
        ]);
    }
}