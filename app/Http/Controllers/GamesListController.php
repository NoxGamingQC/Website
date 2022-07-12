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
            $game = GamesList::where('Game', $request->game)->get();
            if($game->isEmpty()) {
                $newGame = new GamesList;
                
                $newGame->Game = $request->game;
                $newGame->Console = $request->console;
                $newGame->Date = $request->date;
                $newGame->CoverURL = $request->coverURL;
                $newGame->format = $request->format;

                $newGame->save();

                return 0;
            } else {
                abort(403);
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
            $console = ConsolesList::where('Console', $request->console)->get();
            
            if($console->isEmpty()) {
                $newConsole = new ConsolesList;
                $newConsole->Console = $request->console;
                $newConsole->Description = $request->description;
                $newConsole->Date = $request->date;
                $newConsole->Picture = $request->picture;

                $newConsole->save();

                return 200;
            }
            abort(403);
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
