<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\GamesList;
use Carbon\Carbon;
use App\PageLists;

class GamesListController extends Controller
{
    public function index()
    {
        if(PageLists::where('slug', 'games')->first()->inMaintenance && env('APP_ENV') == 'production') {
            abort(503);
        }
        $ps1 = GamesList::where('Console', '4')->orderBy('Game')->get();
        $ps4 = GamesList::where('Console', '6')->orderBy('Game')->get();
        $xbox = GamesList::where('Console', '5')->orderBy('Game')->get();
        $wii = GamesList::where('Console', '8')->orderBy('Game')->get();
        $switch = GamesList::where('Console', '7')->orderBy('Game')->get();
        $nes = GamesList::where('Console', '3')->orderBy('Game')->get();
        $pc = GamesList::where('Console', '9')->orderBy('Game')->get();
        $totalGameCount = (count($nes) + count($ps1) + count($xbox) + count($switch) + count($wii) + count($ps4) + count($pc));
        return view('games', [
            'nes' => $nes,
            'ps1' => $ps1,
            'xbox' => $xbox,
            'switch' => $switch,
            'wii' => $wii,
            'ps4' => $ps4,
            'pc' => $pc,
            'totalGameCount' => $totalGameCount
        ]);
    }
}
