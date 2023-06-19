<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\ServersConfig;
use App\Modules;

class NoxBotDashboardController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::user()) {
            if(Auth::user()->isAdmin || Auth::user()->isDev || Auth::user()->isModerator) {
                $serverConfig = ServersConfig::where('ServerID', '605028700182020101')->first();

                $serverSetting = [
                    'Bot' => [
                        'isActive' => $serverConfig->Bot,
                        'icon' => Modules::where('Slug', 'Bot')->first()->ModuleIcon
                    ],
                    'Info' => [
                        'isActive' => $serverConfig->Info,
                        'icon' => Modules::where('Slug', 'Info')->first()->ModuleIcon
                    ],
                    'Roles' => [
                        'isActive' => $serverConfig->Roles,
                        'icon' => Modules::where('Slug', 'Roles')->first()->ModuleIcon
                    ],
                    'Giveaway' => [
                        'isActive' => $serverConfig->Giveaway,
                        'icon' => Modules::where('Slug', 'Giveaway')->first()->ModuleIcon
                    ],
                    'Management' => [
                        'isActive' => $serverConfig->Management,
                        'icon' => Modules::where('Slug', 'Management')->first()->ModuleIcon
                    ],
                    'Ranking' => [
                        'isActive' => $serverConfig->Ranking,
                        'icon' => Modules::where('Slug', 'Ranking')->first()->ModuleIcon
                    ],
                    'Music' => [
                        'isActive' => $serverConfig->Music,
                        'icon' => Modules::where('Slug', 'Music')->first()->ModuleIcon
                    ],
                    'Miscs' => [
                        'isActive' => $serverConfig->Miscs,
                        'icon' => Modules::where('Slug', 'Miscs')->first()->ModuleIcon
                    ],
                    'Links' => [
                        'isActive' => $serverConfig->Links,
                        'icon' => Modules::where('Slug', 'Links')->first()->ModuleIcon
                    ],
                    'Twitch' => [
                        'isActive' => $serverConfig->Twitch,
                        'icon' => Modules::where('Slug', 'Twitch')->first()->ModuleIcon
                    ],
                    'Games' => [
                        'isActive' => $serverConfig->Games,
                        'icon' => Modules::where('Slug', 'Games')->first()->ModuleIcon
                    ],
                ];

                return view('view.noxbot', [
                    "serverConfig" => $serverConfig,
                    'serverSetting' => $serverSetting
                ]);

            } else {
                abort(403);
            }
        } else {
            abort(403);
        }
    }

    public function post(Request $request) {
        if(Auth::user()) {
            if(Auth::user()->isAdmin || Auth::user()->isDev || Auth::user()->isModerator) {
                $serverConfig = ServersConfig::findOrFail($request->id);
                $serverConfig->Bot = $request->bot;
                $serverConfig->Info = $request->info;
                $serverConfig->Roles = $request->roles;
                $serverConfig->Giveaway = $request->giveaway;
                $serverConfig->Management = $request->management;
                $serverConfig->Ranking = $request->ranking;
                $serverConfig->Music = $request->music;
                $serverConfig->Miscs = $request->miscs;
                $serverConfig->Links = $request->links;
                $serverConfig->Twitch = $request->twitch;
                $serverConfig->Games = $request->games;
                $serverConfig->save();
            } else {
                abort(403);
            }
        } else {
            abort(403);
        }
    }

    public function linkDiscord(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        if (!!$user) {
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

    public function getDashboard(Request $request)
    {
        abort(403);
        /*$datas = ServersConfig::where('ServerID', '605028700182020101')->first();
        $serverLists = [];
        foreach ($datas as $key => $data) {
            array_push($serverLists, $data->ServerID);
        }
        return view('noxbot_dashboard', [
            "serverLists" => $serverLists
        ]);*/
    }

    public function saveServersLists(Request $request)
    {

    }
}
