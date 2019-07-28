<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

class UserProfileController extends Controller
{
    public function index($locale, $id)
    {
        $user = User::findOrFail($id);
        $firstname = $user->isFirstnameShowned ? $user->Firstname : null;
        $lastname = $user->isLastnameShowned ? $user->Lastname : null;
        $age = $user->isAgeShowned ? Carbon::parse($user->Birthdate)->age : null;
        $birthdate = $user->isBirthdateShowned ? $user->Birthdate : null;
        $grade = "Member";

        if ($user->isAdmin) {
            $grade = "administrator";
        } else if($user->isModerator) {
            $grade = "moderator";
        } else if ($user->isDev) {
            $grade = "developper";
        }

        $discordBadges = $user->Badges ? explode(';', $user->Badges) : [];

        if(!!$user->PremiumType) {
            array_push($discordBadges, 'Discord Nitro');
        }

        if(!!$user->PremiumType && $user->PremiumType == 1) {
            $premiumType = 'Discord Nitro Classic';
        } else if(!!$user->PremiumType && $user->PremiumType == 2) {
            $premiumType = 'Discord Nitro';
        } else {
            $premiumType = 'N/A';
        }

        if ($user->isGenderShowned && $user->Gender !== null) {
            $gender = ($user->Gender ? 'Woman' : 'Men');
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
            "discordBadges" => $discordBadges,
            "nitroSubscription"=> $premiumType,
            "avatarURL" => 'https://cdn.discordapp.com/avatars/' . $user->DiscordID . '/' . $user->AvatarURL . '.png',
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

    public function edit()
    {
        if (Auth::user()) {
            $user = User::findOrFail(Auth::user()->id);

            return view('profile_edit', [
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
}
