<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use DB;
use App\GamesList;
use App\ConsolesList;
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

    public function addGame(Request $request) {
        if (Auth::user()->isAdmin) {
            $game = GamesList::where('Game', $request->game);
            if(!$game) {
                GamesList::create([
                    'Game' => $request->game,
                    'Console' => $request->console,
                    'Date' => $request->date,
                    'CoverURL' => $request->coverURL,
                    'format' => $request->format,
                ]);
            }
        } else {
            abort(403);
        }
    }

    public function removeGame(Request $request) {
        if (Auth::user()->isAdmin) {
            $game = GamesList::findOrFail($request->id);
            $game->delete();
        } else {
            abort(403);
        }
    }

    public function addConsole(Request $request) {
        if (Auth::user()->isAdmin) {
            $console = ConsolesList::where('Console', $request->console);
            if(!$console) {
                ConsolesList::create([
                    'Console' => $request->console,
                    'Description' => $request->description,
                    'Date' => $request->date,
                    'Picture' => $request->Picture
                ]);
            }
        } else {
            abort(403);
        }
    }

    public function removeConsole(Request $request) {
        if (Auth::user()->isAdmin) {
            $console = ConsolesList::findOrFail($request->id);
            $console->delete();
        } else {
            abort(403);
        }
    }
}
