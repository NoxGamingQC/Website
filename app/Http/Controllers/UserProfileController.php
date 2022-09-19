<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use App\PageLists;

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

        if (!!$user->PremiumType) {
            array_push($discordBadges, 'Discord Nitro');
        }

        if (!!$user->PremiumType && $user->PremiumType == 1) {
            $premiumType = 'Discord Nitro Classic';
        } elseif (!!$user->PremiumType && $user->PremiumType == 2) {
            $premiumType = 'Discord Nitro';
        } else {
            $premiumType = 'N/A';
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

        return view('profile_show', [
            "username" => $user->name,
            "discordID" => $user->DiscordID,
            "grade" => $grade,
            "isPremium" => $user->isPremium,
            "discordName" => $user->DiscordName,
            "language" => $user->Language,
            "badges" => $badges,
            "nitroSubscription"=> $premiumType,
            "avatarURL" => $user->AvatarURL,
            "discriminator" => $user->Discriminator,
            "discordEmail" => $user->DiscordEmail,
            "firstname" => $firstname,
            "lastname" => $lastname,
            "age" => $age,
            "gender" => $gender,
            "birthdate" => $birthdate,
            "country" => $user->Country,
        ]);
    }

    public function getEditPage()
    {
        if(PageLists::where('slug', 'profile_edit')->first()->inMaintenance && env('APP_ENV') == 'production') {
            abort(503);
        }
        if (Auth::user()) {
            $user = User::findOrFail(Auth::user()->id);

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
                "avatarURL" => 'https://cdn.discordapp.com/avatars/' . $user->DiscordID . '/' . $user->AvatarURL . '.png',
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
                "country"=>$user->Country
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
}
