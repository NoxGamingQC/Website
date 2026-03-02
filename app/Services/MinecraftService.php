<?php

namespace App\Services;

use App\Models\User;

class MinecraftService
{
    /**
     * Return Minecraft info for a user
     */
    public function getInfo(User $user): ?array
    {
        if(!$user->minecraft_uuid) return null;

        $uuid = $user->minecraft_uuid;

        return [
            'uuid' => $uuid,
            'avatar' => 'https://crafthead.net/avatar/' . $uuid,
            'full_skin' => 'https://crafthead.net/armor/body/' . $uuid,
            'cape' => 'https://crafthead.net/cape/' . $uuid,
            'bust' => 'https://crafthead.net/bust/' . $uuid,
            'cube' => 'https://crafthead.net/cube/' . $uuid,
        ];
    }
}