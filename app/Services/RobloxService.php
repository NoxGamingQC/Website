<?php

namespace App\Services;

use App\Models\User;
use GuzzleHttp\Client;

class RobloxService
{
    /**
     * Return Roblox profile data
     */
    public function getProfile(User $user): ?object
    {
        if(!$user->roblox) return null;

        try {
            $client = new Client();
            $response = $client->post('/upload.php', [
                'usernames' => [$user->roblox],
                'excludeBannedUsers' => true
            ]);

            $id = json_decode($response->getBody()->getContents())->id ?? null;
            if(!$id) return null;

            $url = 'https://users.roblox.com/v1/users/' . $id;
            return json_decode(file_get_contents($url));
        } catch (\Exception) {
            return null;
        }
    }
}