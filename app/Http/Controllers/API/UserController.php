<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DiscordUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class UserController extends Controller
{
    public function checkState()
    {
        if(Auth::check()) {
            $user = (Auth::user()->lockStatus == 'online') ? Auth::user()->status : Auth::user()->lockStatus;
            return response()->json($user);
        }

    }

    public function checkStateWithID($id)
    {
        $user = User::findOrFail($id);
        $data = ($user->lockStatus == 'online') ? $user->status : $user->lockStatus;
        return response()->json($data);
    }

    public function getDiscordCurrentStatus($username)
    {
        $url = 'https://discord.com/api/guilds/938558244924829756/widget.json';

        $response = Http::get($url);

        if ($response->failed()) {
            return response()->json(['error' => 'Discord API unreachable'], 500);
        }

        $data = $response->json();

        if (!isset($data['members'])) {
            return response()->json(['error' => 'No members found'], 404);
        }

        // Nettoyer le username venant de l’URL
        $cleanSearch = $this->removeEmoji($username);

        foreach ($data['members'] as $member) {
            if (!isset($member['username'])) {
                continue;
            }

            $cleanMemberName = $this->removeEmoji($member['username']);

            if (mb_strtolower($cleanMemberName) === mb_strtolower($cleanSearch)) {
                return response()->json($member);
            }
        }

        return response()->json(['message' => 'User not found'], 404);
    }

    /**
     * Supprime les émojis et caractères non standards
     */
    private function removeEmoji($string)
    {
        return trim(preg_replace(
            '/[\x{1F000}-\x{1FFFF}]/u',
            '',
            $string
        ));
    }
}