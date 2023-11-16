<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\PageLists;

class BotCommandsController extends Controller
{
    public function index()
    {
        if(PageLists::where('slug', 'commands')->first()->inMaintenance && env('APP_ENV') === 'production') {
            if(Auth::check()) {
                if(Auth::user()->isAdmin || Auth::user()->isModerator || Auth::user()->isDev) {
                    return view('commands');
                }
            }
            abort(503);
        }
        return view('commands');
    }
}