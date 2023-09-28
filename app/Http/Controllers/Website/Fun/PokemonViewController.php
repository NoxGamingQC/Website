<?php

namespace App\Http\Controllers\Website\Fun;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use \Carbon\Carbon;
use App\Pokemon;

class PokemonViewController extends Controller
{
    public function index($language, $slug)
    {
        $pokemon = Pokemon::where('pokedex_number', '=', $slug)->first();
        if(!$pokemon) {
            abort(404);
        }
        return view('view.fun.pokemon')->with([
            'pokemon' => $pokemon
        ]);
    }
}