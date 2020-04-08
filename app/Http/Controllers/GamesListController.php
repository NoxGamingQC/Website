<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GamesList;
use Carbon\Carbon;

class GamesListController extends Controller
{
    public function index()
    {
        $ps1 = GamesList::where('Console', 'PS1')->orderBy('Game')->get();
        $ps4 = GamesList::where('Console', 'PS4')->orderBy('Game')->get();
        $xbox = GamesList::where('Console', 'Xbox')->orderBy('Game')->get();
        $wii = GamesList::where('Console', 'Wii')->orderBy('Game')->get();
        $xbox360 = GamesList::where('Console', 'Xbox360')->orderBy('Game')->get();
        $nes = GamesList::where('Console', 'NES')->orderBy('Game')->get();
        $pc = GamesList::where('Console', 'PC')->orderBy('Game')->get();

        return view('games', [
            'nes' => $nes,
            'ps1' => $ps1,
            'xbox' => $xbox,
            'xbox360' => $xbox360,
            'wii' => $wii,
            'ps4' => $ps4,
            'pc' => $pc
        ]);
    }
}
