<?php

namespace App\Http\Resources\NoxBOT;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Model\NoxBOT\BotActivities;

class ActivityResource extends JsonResource
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
        $activityKey = array_rand($activities, 1);
        return [
            $activities[$activityKey]
        ];
    }
}
