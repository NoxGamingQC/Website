<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Feeds;

class NewsController extends Controller
{
    public function index()
    {
        $gamingNewsSources = [
            'https://feeds.feedburner.com/ign/games-all',
            'https://www.gamespot.com/feeds/game-news/',
            'https://www.eurogamer.net/feed/news',
            'https://www.eurogamer.net/feed/deals',
        ];

        $feed = Feeds::make($gamingNewsSources, 15, true); // Get 15 recent items

        return view('pages.news', ['feed' => $feed]);
    }
}
