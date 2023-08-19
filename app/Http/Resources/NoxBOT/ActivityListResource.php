<?php

namespace App\Http\Resources\NoxBOT;

use Illuminate\Http\Resources\Json\JsonResource;

use App\BotActivities;

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
        foreach (BotActivities::orderBy('ID')->get() as $key => $activity) {
            array_push($activities, $activity->Activity);
        }
        return $activities;
    }
}
