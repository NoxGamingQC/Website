<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\PageLists;

class TwitchController extends Controller
{
    public function index()
    {
        return view('view.about_us.twitch');
    }
}