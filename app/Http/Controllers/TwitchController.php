<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\PageLists;

class TwitchController extends Controller
{
    public function index()
    {
        if(PageLists::where('slug', 'twitch')->first()->in_maintenance && env('APP_ENV') == 'production') {
            abort(503);
        }
        return view('view.about_us.twitch');
    }
}