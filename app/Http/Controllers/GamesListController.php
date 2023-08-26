<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ConsolesList;
use App\GamesList;
use App\PageLists;
use Auth;

class GamesListController extends Controller
{
    public function index()
    {
        if(PageLists::where('slug', 'games')->first()->inMaintenance  && env('APP_ENV') === 'production') {
            if(Auth::check()) {
                if(!Auth::user()->is_management) {
                    abort(503);
                }
            } else {
                abort(503);
            }
        }
        $gamesDB = GamesList::all();
        $consoles = ConsolesList::all();
        $gamesList = [];
        foreach($gamesDB as $key => $game) {
            $games[$game->id] = $game;

            $gameConsole = explode(',', $game->Console);
            if(count($gameConsole) > 1) {
                foreach($gameConsole as $key => $value) {
                    $gamesList[$value] = $game;
                }
            } else {
                foreach($consoles as $key => $console) {
                    $gamesList[$console->id] = GamesList::where('console', $console->id)->get();
                }
            }    
        }
        $totalGameCount = count($gamesDB);
        return view('view.about_us.games', [
            'consoles' => $consoles,
            'games' => $games,
            'gamesList' => $gamesList,
            'totalGameCount' => $totalGameCount
        ]);
    }

    public function addGame(Request $request) {
        if (Auth::user()->is_management) {
            $game = GamesList::where('game', $request->game)->get();
            if($game->isEmpty()) {
                $newGame = new GamesList;
                
                $newGame->game = $request->game;
                $newGame->console = implode(',', $request->console);
                $newGame->date = $request->date;
                $newGame->cover_url = $request->coverURL;
                $newGame->format = implode(',', $request->format);
                $game->playlist = $request->playlist;

                $newGame->save();

                return 0;
            } else {
                abort(403);
            }
        } else {
            abort(403);
        }
    }

    public function editGame(Request $request) {
        if (Auth::user()->is_management) {
            $game = GamesList::findOrFail($request->id);
            $game->game = $request->game;
            $game->console = implode(',', $request->console);
            $game->date = $request->date;
            $game->cover_url = $request->coverURL;
            $game->format = implode(',', $request->format);
            $game->playlist = $request->playlist;

            $game->save();

            return 0;
            
        } else {
            abort(403);
        }
    }

    public function removeGame(Request $request) {
        if (Auth::user()->is_management) {
            $game = GamesList::findOrFail($request->id);
            $game->delete();
        } else {
            abort(403);
        }
    }

    public function addConsole(Request $request) {
        if (Auth::user()->is_management) {
            $console = ConsolesList::where('console', $request->console)->get();
            
            if($console->isEmpty()) {
                $newConsole = new ConsolesList;
                $newConsole->console = $request->console;
                $newConsole->description = $request->description;
                $newConsole->date = $request->date;
                $newConsole->picture = $request->picture;

                $newConsole->save();

                return 200;
            }
            abort(403);
        } else {
            abort(403);
        }
    }

    public function removeConsole(Request $request) {
        if (Auth::user()->is_management) {
            $console = ConsolesList::findOrFail($request->id);
            $console->delete();
        } else {
            abort(403);
        }
    }
}
