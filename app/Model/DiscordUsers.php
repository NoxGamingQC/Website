<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DiscordUsers extends Model
{
    protected $table = 'discord_users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    static public function getUser($userID) {
        $user = DiscordUsers::findOrFail($userID);
        return $user;
    }

    static public function getUserByDiscordID($discordID) {
        $user = DiscordUsers::where('discord_id','=', $discordID)->first();
        return $user;
    }

    static public function getUserByID($id) {
        $user = DiscordUsers::where('id','=', $id)->first();
        return $user;
    }
}
