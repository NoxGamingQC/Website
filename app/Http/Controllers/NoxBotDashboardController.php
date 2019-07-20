<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class NoxBotDashboardController extends Controller
{
    public function index(Request $request)
    {
        $datas = DB::table('servers_config')->get();
        $serverLists = [];
        foreach($datas as $key => $data) {
            array_push($serverLists, $data->ServerID);
        }
        return view('noxbot_dashboard', [
            "serverLists" => $serverLists
        ]);
    }

    public function linkDiscord(Request $request) {
        $user = User::findOrFail(Auth::user()->id);

        if(!!$user->DiscordID) {
            $user->DiscordID = $request->discordID;
            $user->DiscordName = $request->discordName;
            $user->isVerified = $request->discordIsUserVerified;
            $user->Discriminator = $request->discordDiscriminator;
            $user->AvatarURL = $request->discordAvatar;
            $user->DiscordEmail = $request->discordEmail;
            $user->Badges = $request->discordBadges;
            $user->mfa_enabled = $request->mfa_enabled;
            $user->PremiumType = $request->discordPremiumType;
            $user->Language = $request->discordLanguage;

            $user->save();
        } else {
            abort(401);
        }
    }

    public function saveServersLists(Request $request) {

    }
}
