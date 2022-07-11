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
        $games = GamesList::all();
        $consoles = ConsolesList::all();
        $gamesList = [];
        foreach($consoles as $key => $value) {
            $gamesList[$value->id] = GamesList::where('Console', $value->id)->get();
        }
        $totalGameCount = count($games);
        return view('games', [
            'consoles' => $consoles,
            'gamesList' => $gamesList,
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
