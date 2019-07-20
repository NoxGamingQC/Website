<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserProfileController extends Controller
{
    public function edit()
    {
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
            "discordBadges"=>$user->Badges,
            "avatarURL"=>$user->AvatarURL,
            "discriminator"=>$user->Discriminator,
            "discordEmail"=>$user->DiscordEmail,
            "firstname"=>$user->Firstname,
            "lastname"=>$user->Lastname,
            "birthdate"=>$user->Birthdate,
            "gender"=>$user->Gender,
            "isFirstnameShowned"=>$user->isFirstnameShowned,
            "isLastnameShowned"=>$user->isLastnameShowned,
            "isGenderShowned"=>$user->isGenderShowned,
            "isBirthdateShowned"=>$user->isBirthdateShowned,
            "isAgeShowned"=>$user->isAgeShowned

        ]);
    }
}
