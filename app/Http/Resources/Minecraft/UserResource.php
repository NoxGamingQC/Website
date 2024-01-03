<?php

namespace App\Http\Resources\Minecraft;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Points;
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
        $apiUrl = 'https://crafthead.net/';
        try {
            $userData = json_decode(file_get_contents($apiUrl . 'profile/' . $this->resource));
            return [
                'name' => $userData->name,
                'uuid' => str_split($userData->id, 8)[0] . '-' . str_split($userData->id, 4)[2]  . '-' . str_split($userData->id, 4)[3]  . '-' . str_split($userData->id, 4)[4] . '-' . substr($userData->id, 20),
                'shorten_uuid' => $userData->id,
                'avatar' => $apiUrl . 'avatar/' . $userData->id,
                'body' => $apiUrl . 'body/' . $userData->id,
                'bust' => $apiUrl . 'bust/' . $userData->id,
                'cube' => $apiUrl . 'cube/' . $userData->id,
                'cape' => $apiUrl . 'cape/' . $userData->id,
                'source' => 'This request uses data from: ' . $apiUrl
            ];
        } catch (\Exception $exception) {
            abort(404, 'Minecraft user not found. There can also be an issue with the api, if so have you try using the user uuid instead?');
        }
    }
}
