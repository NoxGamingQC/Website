<?php

namespace App\Services;

use App\Models\User;

class AvatarService
{
    /**
     * Return the correct avatar URL for a user
     */
    public function getAvatar(User $user): string
    {
        if($user->avatar_preference === 'minecraft' && $user->minecraft_uuid) {
            return 'https://crafthead.net/avatar/' . $user->minecraft_uuid;
        }

        if($user->avatar_url) {
            return $user->avatar_url;
        }

        return '/img/no-avatar.jpg';
    }
}