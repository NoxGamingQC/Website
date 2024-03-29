<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Model\DiscordUsers;
use Carbon\Carbon;
use App\Model\PageLists;
use cebe\markdown;
use App\Model\Points;
use App\Model\API\ApiKey;
use App\Model\User;

class UserProfileController extends Controller
{
    public function index($locale, $id)
    {
        $user = null;
        $users = User::all();
        foreach($users as $userResource) {
            if(strtolower($userResource->name) == strtolower($id)) {
                $user = $userResource;
            }
        }
        if(!$user) {
            $user = User::find($id);
        }
        if(!$user) {
            abort(404);
        }
        if($user->private) {
            if(Auth::check()) {
                if(!(Auth::user()->id == $user->id || Auth::user()->is_management)) {
                    abort(404);
                }
            } else {
                abort(404);
            }
        }
        $firstname = $user->show_firstname ? $user->firstname : null;
        $lastname = $user->show_lastname ? $user->lastname : null;
        $age = $user->show_age ? Carbon::parse($user->birthdate)->age : null;
        $birthdate = $user->show_birthdate ? $user->birthdate : null;
        $grade = $user->is_management ? "management_team" : "member";
        $xboxProfile = null;

        if($user->xbox_gamertag) {
            try {
                $xboxProfile = json_decode(file_get_contents((env('APP_PROD_URL') ? env('APP_PROD_URL') : env('APP_URL')) . '/api/xbox/'. $user->xbox_gamertag));
            } catch (\Exception $exception) {
                $xboxProfile = null;
            }
        }

        if($user->roblox) {
            try {
                $client = new \GuzzleHttp\Client();
                $robloxResponse = $client->request('POST', '/upload.php', [
                    'usernames' => [
                        $user->roblox
                      ],
                      "excludeBannedUsers" => true
                ]);
                $robloxProfile = json_decode('https://users.roblox.com/v1/users/' . json_decode($robloxResponse->id));
            } catch (\Exception $exception) {
                $robloxProfile = null;
            }
        }

        $badges = $user->badges ? explode(';', $user->badges) : [];

        $points = Points::getPointsLogs($user->id, 10);
        $pointCount = Points::getTotalPoints($user->id);

        if($user->premium_expiration === 'lifetime') {
            $premiumTime = 'lifetime';
        } elseif($user->premium_expiration == null) {
            $premiumTime = null;
        } else {
            $premiumTime = $user->premium_expiration;
        }
        
        if ($user->show_gender && $user->gender !== null) {
            if($user->gender == 0) {
                $gender = 'Other';
            } elseif($user->gender == 1) {
                $gender = 'Male';
            } else if($user->gender == 2) {
                $gender = 'Female';
            }
        } else {
            $gender = null;
        }
        if(Auth::check()) {
            $isCurrentUser = ($user->id == Auth::user()->id);
        } else {
            $isCurrentUser = false;
        }

        if ($user->lock_status === 'online' || $user->status === 'offline') {
            $state = $user->status;
        } else {
            $state = $user->lock_status;
        }
        $aboutMeContent = null;
        if($user->about_me) {
            try{
                $markdownParser = new markdown\GithubMarkdown();
                $rawAboutMe = file_get_contents($user->about_me);
                $aboutMeContent = $markdownParser->parse($rawAboutMe);
            } catch (\Exception $exception) {
                $aboutMeContent = $user->about_me;
            }
        }
        return view('view.profile.profile', [
            "id" => $user->id,
            "username" => $user->name,
            "grade" => $grade,
            "isPremium" => $user->has_premium,
            "language" => $user->language,
            "badges" => $badges,
            "premiumTime" => $premiumTime,
            "avatarURL" => User::getPicture($user),
            "firstname" => $firstname,
            "lastname" => $lastname,
            "age" => $age,
            "gender" => $gender,
            "birthdate" => $birthdate,
            "country" => $user->country,
            'pointCount' => $pointCount,
            'points' => $points,
            'state' => $state,
            'isCurrentUser' => $isCurrentUser,
            'aboutMe' => $aboutMeContent ? $aboutMeContent : ($xboxProfile ?  ($xboxProfile->data->bio ? ('<h1>About me</h1><hr /><p>' . $xboxProfile->data->bio . '</p>') : null) : null),
            'minecraft' => User::getMinecraftInfo($user),
            'discordUser' => User::getDiscordInfo($user),
            'pronouns' => $user->pronouns,
            'xbox_profile' => $xboxProfile,
            'header' => false,
        ]);
    }

    public function edit($locale)
    {
        $user = Auth::user();
        $firstname = $user->show_firstname ? $user->firstname : null;
        $lastname = $user->show_lastname ? $user->lastname : null;
        $age = $user->show_age ? Carbon::parse($user->birthdate)->age : null;
        $birthdate = $user->show_birthdate ? $user->birthdate : null;
        $grade = $user->is_management ? "management_team" : "member";
        $xboxProfile = null;

        if($user->xbox_gamertag) {
            try {
                $xboxProfile = json_decode(file_get_contents((env('APP_PROD_URL') ? env('APP_PROD_URL') : env('APP_URL')) . '/api/xbox/'. $user->xbox_gamertag));
            } catch (\Exception $exception) {
                $xboxProfile = null;
            }
        }

        if($user->roblox) {
            try {
                $client = new \GuzzleHttp\Client();
                $robloxResponse = $client->request('POST', '/upload.php', [
                    'usernames' => [
                        $user->roblox
                      ],
                      "excludeBannedUsers" => true
                ]);
                $robloxProfile = json_decode('https://users.roblox.com/v1/users/' . json_decode($robloxResponse->id));
            } catch (\Exception $exception) {
                $robloxProfile = null;
            }
        }

        $badges = $user->badges ? explode(';', $user->badges) : [];

        $points = Points::getPointsLogs($user->id, 10);
        $pointCount = Points::getTotalPoints($user->id);

        if($user->premium_expiration === 'lifetime') {
            $premiumTime = 'lifetime';
        } elseif($user->premium_expiration == null) {
            $premiumTime = null;
        } else {
            $premiumTime = $user->premium_expiration;
        }
        
        if ($user->show_gender && $user->gender !== null) {
            if($user->gender == 0) {
                $gender = 'Other';
            } elseif($user->gender == 1) {
                $gender = 'Male';
            } else if($user->gender == 2) {
                $gender = 'Female';
            }
        } else {
            $gender = null;
        }
        if(Auth::check()) {
            $isCurrentUser = ($user->id == Auth::user()->id);
        } else {
            $isCurrentUser = false;
        }

        if ($user->lock_status === 'online' || $user->status === 'offline') {
            $state = $user->status;
        } else {
            $state = $user->lock_status;
        }
        $aboutMeContent = null;
        if($user->about_me) {
            try{
                $markdownParser = new markdown\GithubMarkdown();
                $rawAboutMe = file_get_contents($user->about_me);
                $aboutMeContent = $markdownParser->parse($rawAboutMe);
            } catch (\Exception $exception) {
                $aboutMeContent = $user->about_me;
            }
        }
        return view('view.profile.edit_profile', [
            "id" => $user->id,
            "username" => $user->name,
            "grade" => $grade,
            "isPremium" => $user->has_premium,
            "language" => $user->language,
            "badges" => $badges,
            "premiumTime" => $premiumTime,
            "avatarURL" => User::getPicture($user),
            "firstname" => $firstname,
            "lastname" => $lastname,
            "age" => $age,
            "gender" => $gender,
            "birthdate" => $birthdate,
            "country" => $user->country,
            'pointCount' => $pointCount,
            'points' => $points,
            'state' => $state,
            'isCurrentUser' => $isCurrentUser,
            'aboutMe' => $aboutMeContent ? $aboutMeContent : ($xboxProfile ?  ($xboxProfile->data->bio ? ('<h1>About me</h1><hr /><p>' . $xboxProfile->data->bio . '</p>') : null) : null),
            'minecraft' => User::getMinecraftInfo($user),
            'discordUser' => User::getDiscordInfo($user),
            'pronouns' => $user->pronouns,
            'xbox_profile' => $xboxProfile,
            'header' => false,
        ]);
    }



    public function updateState(Request $request) {
        if (Auth::user()) {
            if($request->state === 'offline') {
                sleep(45);
            }
            $user = User::findOrFail(Auth::user()->id);
            if($user->Status != $request->state) {
                $user->status = $request->state;
                $user->last_status_time = Carbon::now();
                $user->save();
            }
            if($user->lock_status === 'online') {
                return false;
            } else {
                return true;
            }
        }
    }

    public function link(Request $request) {
        if(Auth::check()) {
            if($request->platform === 'discord') {
                $discordUser = DiscordUsers::where('linking_token', '=', trim($request->link_token))->first();
                $user = User::findOrFail(Auth::user()->id);
                if($discordUser && $user) {
                    $user->discord_id = $discordUser->id;
                    $discordUser->linking_token = null;
                    $user->save();
                    $discordUser->save();
                    return;
                }
            }
        }
        abort(403);
    }

    public function newLink(Request $request) {
        $getApp = ApiKey::where('key', '=', $request->website_token)->first();
        if($getApp) {
            $key = str_random(128);
            if($request->platform == 'discord') {
                $discordUser = DiscordUsers::where('discord_id', '=', trim($request->discord_id))->first();
                if($discordUser) {
                    $discordUser->linking_token = $key;
                    $discordUser->save();
                }
            }
            return $key;
        }
        abort(403);
    }
}
