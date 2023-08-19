<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\DiscordUser;
use App\User;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        $username = $this->resource;
        $user = User::where('name', '=', $username)->first();
        if($user) {
            $discordUser = DiscordUsers::getUserByID($user->discord_id);
            return [
                'id' => $user->id,
                'username' => $user->name,
                'pronouns' => $user->pronouns,
                'firstname' => $user->isFirstnameShowned ? $user->Firstname : null,
                'lastname' => $user->isLastnameShowned ? $user->Lastname : null,
                'language' => $user->Language,
                'emails' => !explode(';', $user->local_mail)[0] == "" ? explode(';', $user->local_mail) : null,
                'isPremium' => $user->isPremium,
                'country' => $user->Country,
                'isManager' => ($user->isAdmin || $user->isModerator || $user->isDev),
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
                'minecraft' => [
                    'uuid' => $user->minecraft_uuid
                ]
            ];
        } else {
            $users = User::all();
            foreach($users as $user) {
                if(strtolower($user->name) == strtolower($this->resource)) {
                    return [
                        'id' => $user->id,
                        'username' => $user->name,
                        'pronouns' => $user->pronouns,
                        'firstname' => $user->isFirstnameShowned ? $user->Firstname : null,
                        'lastname' => $user->isLastnameShowned ? $user->Lastname : null,
                        'language' => $user->Language,
                        'emails' => !explode(';', $user->local_mail)[0] == "" ? explode(';', $user->local_mail) : null,
                        'isPremium' => $user->isPremium,
                        'country' => $user->Country,
                        'isManager' => ($user->isAdmin || $user->isModerator || $user->isDev),
                        'created_at' => $user->created_at,
                        'updated_at' => $user->updated_at,
                        'minecraft' => [
                            'uuid' => $user->minecraft_uuid
                        ]
                    ];
                }
            }
        }
        abort(404, 'User not found');
    }
}
