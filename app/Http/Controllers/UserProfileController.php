<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use App\PageLists;
use App\Points;

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

        if ($user->isAdmin) {
            $grade = "administrator";
        } elseif ($user->isModerator) {
            $grade = "moderator";
        } elseif ($user->isDev) {
            $grade = "developper";
        }

        $badges = $user->Badges ? explode(';', $user->Badges) : [];

        $points = Points::getPointsLogs($user->id);
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

        return view('profile_show', [
            "username" => $user->name,
            "discordID" => $user->DiscordID,
            "grade" => $grade,
            "isPremium" => $user->isPremium,
            "discordName" => $user->DiscordName,
            "language" => $user->Language,
            "badges" => $badges,
            "premiumTime" => $premiumTime,
            "avatarURL" => $user->AvatarURL,
            "discriminator" => $user->Discriminator,
            "discordEmail" => $user->DiscordEmail,
            "firstname" => $firstname,
            "lastname" => $lastname,
            "age" => $age,
            "gender" => $gender,
            "birthdate" => $birthdate,
            "country" => $user->Country,
            'pointCount' => $pointCount,
            'points' => $points,
            'state' => $state,
            'isCurrentUser' => $isCurrentUser
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

            return view('profile_edit', [
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
                'state' => $state
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
}
