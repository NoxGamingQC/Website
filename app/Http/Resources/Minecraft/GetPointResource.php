<?php

namespace App\Http\Resources\Minecraft;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Points;
use App\User;

class GetPointResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        $userUUID = $this->resource;
        $user = User::where('minecraft_uuid', '=', $userUUID)->first();
        if($user) {
            $points = Points::getTotalPoints($user->id);

            return [
                'points' => $points
            ];
        }
        abort(403);
    }
}
