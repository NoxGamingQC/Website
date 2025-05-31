<?php

namespace App\Http\Resources\NoxBOT;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Model\API\ApiKey;
use App\Model\User;

class TwitchSetupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        $user = ApiKey::where('key', '=', $this->resource['token'])->first();
        if(is_null($user)) {
            abort(401);
        }
        $streamers = User::where('twitch_connect_chat', true)->get();
        $streamersList = [];
        foreach ($streamers as $streamer) {
            $streamersList[strtolower($streamer->name)] = $streamer->twitch_id;
        }
        return [
            'client_id' => $user->twitch_app_id,
            'client_secret' => $user->twitch_secret,
            'bot_id' => $user->twitch_id,
            'oauth_token' => $user->twitch_oauth_token,
            'refresh_token' => $user->twitch_refresh_token,
            'streamers' => $streamersList
        ];
    }
}
