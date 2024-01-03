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
            $xboxWatermarks = explode('|', $result->data->player->meta->watermarks);
            $watermarks = [];
            foreach($xboxWatermarks as $watermark) {
                if($watermark) {
                    if($watermark !== 'ambassadorl0') {
                        $watermarks[$watermark] = 'https://statics-xbc-neu.xbox.com/_h/0/xbox.modules/images/social/' . $watermark . '.png';
                    } else {
                        // Need to find the official static one...
                        $watermarks[$watermark] = 'https://compass-ssl.microsoft.com/assets/3a/26/3a268d11-03f9-4a8b-a65a-8512f16e4ea4.png?n=LVL1.png';
                    }
                }
            }
            return [
                'id' => $result->data->player->id,
                'gamerscore' => $result->data->player->meta->gamerscore,
                'account_tier' => $result->data->player->meta->accountTier,
                'xbox_one_rep' => $result->data->player->meta->xboxOneRep,
                'bio' => $result->data->player->meta->bio ? $result->data->player->meta->bio : null,
                'tenure_level' => [
                    'level' => $result->data->player->meta->tenureLevel,
                    'img' => $result->data->player->meta->tenureLevel !== "0" ? 'https://statics-xbc-neu.xbox.com/_h/0/xbox.modules/images/social/xboxtenure' . $result->data->player->meta->tenureLevel . '.png' : null,
                ],
                'watermarks' => $watermarks ? $watermarks : null,
                'username' => $result->data->player->username,
                'avatar' => $result->data->player->avatar,
                'preferred_color' => [
                    'primary_color' => $preferredColor->primaryColor,
                    'secondary_color' => $preferredColor->secondaryColor,
                    'tertiary_color' => $preferredColor->tertiaryColor,
                ],
            ];
        } catch (\Exception $exception) {
            abort(404, 'User not found');
        }
    }
}
