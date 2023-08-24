<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DiscordUsers;
use App\User;
use Carbon\Carbon;
use App\PageLists;
use App\Points;
use cebe\markdown;
use App\ApiKey;

class UserProfileController extends Controller
{
    public function index($locale, $id)
    {
        if(PageLists::where('slug', 'profile_show')->first()->inMaintenance && env('APP_ENV') == 'production') {
            abort(503);
        }
        
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
        $firstname = $user->show_firstname ? $user->firstname : null;
        $lastname = $user->show_lastname ? $user->lastname : null;
        $age = $user->show_age ? Carbon::parse($user->birthdate)->age : null;
        $birthdate = $user->show_birthdate ? $user->birthdate : null;
        $grade = $user->isManagement ? "management_team" : "member";
        $xboxProfile = null;

        if($user->xbox_gamertag) {
            try {
                $xboxProfile = json_decode(file_get_contents((env('APP_PROD_URL') ? env('APP_PROD_URL') : env('APP_URL')) . '/api/xbox/'. $user->xbox_gamertag));
            } catch (\Exception $exception) {
                $xboxProfile = null;
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
        //$markdownParser = new markdown\GithubMarkdown();
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
            'aboutMe' => null,//$markdownParser->parse($user->about_me),
            'minecraft' => User::getMinecraftInfo($user),
            'discordUser' => User::getDiscordInfo($user),
            'pronouns' => $user->pronouns,
            'xbox_profile' => $xboxProfile
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
                $user = Auth::user();
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
