<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\PageLists;

class YoutubeController extends Controller
{
    public function index()
    {
        if(PageLists::where('slug', 'youtube')->first()->in_maintenance && env('APP_ENV') == 'production') {
            abort(503);
        }
        abort(503);
        //return view('youtube');
    }
}