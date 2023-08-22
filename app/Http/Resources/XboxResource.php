<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class XboxResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        try {
            
            $url = "https://playerdb.co/api/player/xbox/" . $this->resource;
            $result = json_decode(file_get_contents($url));
            if(!$result->success) {
                abort(404);
            }
            $preferredColor = json_decode(file_get_contents($result->data->player->meta->preferredColor));
            return [
                'id' => $result->data->player->id,
                'gamerscore' => $result->data->player->meta->gamerscore,
                'account_tier' => $result->data->player->meta->accountTier,
                'xbox_one_rep' => $result->data->player->meta->xboxOneRep,
                'bio' => $result->data->player->meta->bio,
                'tenure_level' => $result->data->player->meta->tenureLevel,
                'watermarks' => $result->data->player->meta->watermarks,
                'username' => $result->data->player->username,
                'avatar' => $result->data->player->avatar,
                'preferred_color' => [
                    'primary_color' => $preferredColor->primaryColor,
                    'secondary_color' => $preferredColor->secondaryColor,
                    'tertiary_color' => $preferredColor->tertiaryColor,
                ],
            ];
        } catch (\Exception $exception) {
            dd($exception);
            abort(404, 'User not found');
        }
    }
}
