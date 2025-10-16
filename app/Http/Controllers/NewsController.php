<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Feeds;

class NewsController extends Controller
{
    public function index()
    {
        $sources = [
            'https://feeds.feedburner.com/ign/games-all',
            'https://www.gamespot.com/feeds/game-news/',
            'https://www.pcgamer.com/rss/',
            'https://kotaku.com/rss',
            'https://www.eurogamer.net/feed/news',
            'https://www.eurogamer.net/feed/deals',
        ];

        $feed = Feeds::make($sources, 10, true); // Get 10 recent items

        return view('pages.news', ['feed' => $feed]);
    }
}
