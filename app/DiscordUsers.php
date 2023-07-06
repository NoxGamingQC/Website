<?php

namespace App;

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
}
