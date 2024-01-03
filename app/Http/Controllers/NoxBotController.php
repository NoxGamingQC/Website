<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\DiscordServerConfig;
use App\Model\DiscordUsers;
use \Carbon\Carbon;

class NoxBotController extends Controller
{
    public function index()
    {
        if(Auth::check()) {
            $user = Auth::user()->discord_id ? DiscordUsers::find(Auth::user()->discord_id) : null;
            $maxItemPerRow = 3;
            $minRowSize = 4;
            if($user) {
                $servers = DiscordServerConfig::where('owner_id', '=', $user->discord_id)->get();
                $itemLeft = count($servers);
                foreach($servers as $server) {
                    if($itemLeft >= $maxItemPerRow) {
                        $server['col_size'] = $minRowSize;
                        $itemLeft --;
                    } else if ($itemLeft == 2) {
                        $server['col_size'] = 6;
                        $itemLeft --;
                    } else {
                        $server['col_size'] = 12;
                        $itemLeft --;
                    }
                }
                return view('view.noxbot.index')->with([
                    'servers' => $servers
                ]);
            }
        }
        abort(403);
    }

    public function getDashboard($language, $id)
    {
        if(Auth::check()) {
            $user = Auth::user()->discord_id ? DiscordUsers::find(Auth::user()->discord_id) : null;
            if($user) {
                $server = DiscordServerConfig::where('discord_id', '=', $id)->first();
                if($user->discord_id == $server->owner_id) {
                    $owner = DiscordUsers::where('discord_id', '=', $server->owner_id)->first();
                    return view('view.noxbot.dashboard', [
                        'id' => $server->discord_id,
                        'avatar_url' => $server->avatar_url,
                        'prefix' => $server->prefix,
                        'can_receive_points' => $server->can_receive_points,
                        'created_at' => Carbon::parse($server->created_at)->format('Y-m-d H:i'),
                        'updated_at' => Carbon::parse($server->updated_at)->format('Y-m-d H:i'),
                        'name' => $server->name,
                        'owner_name' => $owner ? $owner->name : null,
                        'enabled_modules' => is_null($server->enabled_modules) ? null : explode(';', $server->enabled_modules)
                    ]);
                }
            }
        }
        abort(403);
    }
}