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
        $ps1 = GamesList::where('Console', 'PS1')->get();
        $ps4 = GamesList::where('Console', 'PS4')->get();
        $xbox = GamesList::where('Console', 'Xbox')->get();
        $wii = GamesList::where('Console', 'Wii')->get();
        $xbox360 = GamesList::where('Console', 'Xbox360')->get();
        $nes = GamesList::where('Console', 'NES')->get();
        $pc = GamesList::where('Console', 'PC')->get();

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
