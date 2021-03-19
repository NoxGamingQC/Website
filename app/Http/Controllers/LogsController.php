<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\PageLists;

class LogsController extends Controller
{
    public function index(Request $request)
    {
        if(PageLists::where('slug', 'logs')->first()->inMaintenance && env('APP_ENV') == 'production') {
            abort(503);
        }
        if (Auth::user()) {
            if (Auth::user()->isAdmin || Auth::user()->isMod || Auth::user()->isDev) {
                $date = new Carbon($request->get('date', today()));
                $filePath = storage_path("logs/laravel-{$date->format('Y-m-d')}.log");
                $data = [];

                if(File::exists($filePath)) {
                    $data = [
                        'lastModified' => new Carbon(File::lastModified($filePath)),
                        'size' => File::size($filePath),
                        'file' => File::get($filePath),
                    ];
                }

                return view('logs', compact('date', 'data'));
            }
        }
        abort(403);
    }
}