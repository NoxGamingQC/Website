<?php

namespace App\Http\Resources\NoxBOT;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Model\NoxBOT\BotActivities;

class ActivityListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        $activities = [];
        foreach (BotActivities::orderBy('id')->get() as $key => $activity) {
            array_push($activities, $activity->activity);
        }
        return $activities;
    }
}
