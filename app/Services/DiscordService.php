<?php

namespace App\Services;

use App\Models\User;
use App\Models\DiscordUsers;

class DiscordService
{
    /**
     * Return Discord user info
     */
    public function getUserInfo(User $user): ?DiscordUsers
    {
        if(!$user->discord_id) return null;

        return DiscordUsers::find($user->discord_id);
    }

    /**
     * Link Discord account to a user
     */
    public function linkDiscord(User $user, string $linkToken): bool
    {
        $discordUser = DiscordUsers::where('linking_token', trim($linkToken))->first();
        if(!$discordUser) return false;

        $user->discord_id = $discordUser->id;
        $discordUser->linking_token = null;
        $user->save();
        $discordUser->save();

        return true;
    }
}