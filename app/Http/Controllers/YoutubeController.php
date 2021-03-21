<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PageLists;

class YoutubeController extends Controller
{
    public function index()
    {
        if(PageLists::where('slug', 'youtube')->first()->inMaintenance && env('APP_ENV') == 'production') {
            abort(503);
        }
        abort(503);
        //return view('youtube');
    }
}