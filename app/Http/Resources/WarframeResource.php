<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WarframeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        $data = [];
        if($this->resource['type'] == 'warframe') {
            $data = WarframeResource::warframe($this->resource['name']);
        }
        
        return $data;
    }

    private function warframe($name) {
        $apiUrl = "https://unpkg.com/warframe-items@latest/data/json/Warframes.json";
        $warframesData = json_decode(file_get_contents($apiUrl));
        foreach($warframesData as $warframeData) {
            if(strtolower($warframeData->name) == strtolower($name)) {
                $abilities = [];
                foreach($warframeData->abilities as $ability) {
                    array_push($abilities, $ability->name);
                }
                return [
                    'name' => $warframeData->name,
                    'description' => $warframeData->description,
                    'sex' => $warframeData->sex,
                    'power' => $warframeData->power,
                    'armor' => $warframeData->armor,
                    'shield' => $warframeData->shield,
                    'health' => $warframeData->health,
                    'is_prime' => $warframeData->isPrime,
                    'release_date' => $warframeData->releaseDate,
                    'abilities' => $abilities,
                    'aura' => $warframeData->aura,
                    'img' => 'https://cdn.warframestat.us/img/' . strtolower($warframeData->name) . '.png',
                    'source' => 'All data come from https://unpkg.com/browse/warframe-items@latest/data/json/. All images come from https://github.com/WFCD/warframe-items project.'
                ];
            }
        }
        abort(404, 'Warframe not found');
    }
}
