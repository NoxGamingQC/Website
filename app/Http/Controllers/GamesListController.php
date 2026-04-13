<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ConsolesList;
use App\Models\GamesList;

class GamesListController extends Controller
{
    public function index()
    {
        $consoles = ConsolesList::all()->sortBy('console');
        $games = GamesList::all()->sortBy('name');
        $totalGameCount = count($games);
        return view('games_list', [
            'consoles' => $consoles,
            'games' => $games,
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
