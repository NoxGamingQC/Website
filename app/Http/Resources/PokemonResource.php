<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PokemonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        $apiUrl = "https://pokeapi.co/api/v2/pokemon/";
        $pokemonData = json_decode(file_get_contents($apiUrl . $this->resource));
        $pokemonSpeciesData = json_decode(file_get_contents($pokemonData->species->url));
        $pokemonTypes = [];
        foreach($pokemonData->types as $type) {
            array_push($pokemonTypes, $type->type->name);
        }
        return [
            'id' => $pokemonData->id,
            'name' => $pokemonData->name,
            'description' => str_replace("\f", " ", str_replace("\n", " ", $pokemonSpeciesData->flavor_text_entries[0]->flavor_text)),
            'color' => $pokemonSpeciesData->color->name,
            'height' => $pokemonData->height,
            'weight' => $pokemonData->weight,
            'is_legendary' => $pokemonSpeciesData->is_legendary,
            'is_mythical' => $pokemonSpeciesData->is_mythical,
            'types' => $pokemonTypes,
            'capture_rate' => $pokemonSpeciesData->capture_rate,
            'growth_rate' => $pokemonSpeciesData->growth_rate->name,
            'sprite' => $pokemonData->sprites->front_default,
            'sprite_shiny' => $pokemonData->sprites->front_shiny
        ];
    }
}
