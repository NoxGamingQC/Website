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
        $user = User::findOrFail($id);
        $firstname = $user->isFirstnameShowned ? $user->Firstname : null;
        $lastname = $user->isLastnameShowned ? $user->Lastname : null;
        $age = $user->isAgeShowned ? Carbon::parse($user->Birthdate)->age : null;
        $birthdate = $user->isBirthdateShowned ? $user->Birthdate : null;
        $grade = "member";
        $xboxProfile = null;

        if ($user->isAdmin) {
            $grade = "administrator";
        } elseif ($user->isModerator) {
            $grade = "moderator";
        } elseif ($user->isDev) {
            $grade = "developper";
        }
        if($user->xbox_gamertag) {
            $xboxProfile = json_decode(file_get_contents((env('APP_PROD_URL') ? env('APP_PROD_URL') : env('APP_URL')) . '/api/xbox/'. $user->xbox_gamertag));
        }

        $badges = $user->Badges ? explode(';', $user->Badges) : [];

        $points = Points::getPointsLogs($user->id, 10);
        $pointCount = Points::getTotalPoints($user->id);

        if($user->PremiumDuration === 'lifetime') {
            $premiumTime = 'lifetime';
        } elseif($user->PremiumDuration == null) {
            $premiumTime = null;
        } else {
            $premiumTime = $user->PremiumDuration;
        }
        
        if ($user->isGenderShowned && $user->Gender !== null) {
            if($user->Gender == 0) {
                $gender = 'Other';
            } elseif($user->Gender == 1) {
                $gender = 'Male';
            } else if($user->Gender == 2) {
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

        if ($user->lockStatus === 'online' || $user->status === 'offline') {
            $state = $user->status;
        } else {
            $state = $user->lockStatus;
        }
        $markdownParser = new markdown\GithubMarkdown();
        return view('view.profile.show', [
            "id" => $user->id,
            "username" => $user->name,
            "grade" => $grade,
            "isPremium" => $user->isPremium,
            "language" => $user->Language,
            "badges" => $badges,
            "premiumTime" => $premiumTime,
            "avatarURL" => User::getPicture($user),
            "firstname" => $firstname,
            "lastname" => $lastname,
            "age" => $age,
            "gender" => $gender,
            "birthdate" => $birthdate,
            "country" => $user->Country,
            'pointCount' => $pointCount,
            'points' => $points,
            'state' => $state,
            'isCurrentUser' => $isCurrentUser,
            'aboutMe' => $markdownParser->parse($user->about_me),
            'socials' => User::getSocialsLinks($user),
            'minecraft' => User::getMinecraftInfo($user),
            'discordUser' => User::getDiscordInfo($user),
            'pronouns' => $user->pronouns,
            'xbox_profile' => $xboxProfile
        ]);
    }

    public function getEditPage()
    {
        if(PageLists::where('slug', 'profile_edit')->first()->inMaintenance && env('APP_ENV') == 'production') {
            abort(503);
        }
        if (Auth::user()) {
            $user = User::findOrFail(Auth::user()->id);

            if ($user->lockStatus === 'online' || $user->status === 'offline') {
                $state = $user->status;
            } else {
                $state = $user->lockStatus;
            }

            return view('view.profile.edit', [
                "id" => $user->id,
                "email"=>$user->email,
                "username"=>$user->name,
                "discordID"=>$user->DiscordID,
                "isAdmin"=>$user->isAdmin,
                "isMod"=>$user->isModerator,
                "isDev"=>$user->isDev,
                "isPremium"=>$user->isPremium,
                "discordName"=>$user->DiscordName,
                "language"=>$user->Language,
                "avatarURL" => $user->AvatarURL,
                "discriminator"=>$user->Discriminator,
                "firstname"=>$user->Firstname,
                "lastname"=>$user->Lastname,
                "birthdate"=>$user->Birthdate,
                "gender"=>$user->Gender,
                "theme"=>$user->theme,
                "isFirstnameShowned"=>$user->isFirstnameShowned,
                "isLastnameShowned"=>$user->isLastnameShowned,
                "isGenderShowned"=>$user->isGenderShowned,
                "isBirthdateShowned"=>$user->isBirthdateShowned,
                "isAgeShowned"=>$user->isAgeShowned,
                "country"=>$user->Country,
                "state" => $state,
                "avatarPreference" => $user->avatar_preference,
                "aboutMe" => $user->about_me
            ]);
        } else {
            abort(403);
        }
    }

    public function edit(Request $request) {
        if (Auth::user()) {
            $user = User::findOrFail(Auth::user()->id);
            $user->name = $request->username;
            $user->email = $request->email;
            $user->Firstname = $request->firstname;
            $user->Lastname = $request->lastname;
            $user->Birthdate = $request->birthdate;
            $user->Gender = $request->gender;
            $user->Country = $request->country;
            $user->theme = $request->theme;
            $user->AvatarURL = $request->avatar;
            $user->isFirstnameShowned = $request->showFirstname;
            $user->isLastnameShowned = $request->showLastname;
            $user->isGenderShowned = $request->showGender;
            $user->isBirthdateShowned = $request->showBirthdate;
            $user->isAgeShowned = $request->showAge;
            $user->save();
        } else {
            abort(403);
        }
    }

    public function updateState(Request $request) {
        if (Auth::user()) {
            if($request->state === 'offline') {
                sleep(45);
            }
            $user = User::findOrFail(Auth::user()->id);
            if($user->Status != $request->state) {
                $user->status = $request->state;
                $user->statusTimeCheck = Carbon::now();
                $user->save();
            }
            if($user->lockStatus === 'online') {
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
