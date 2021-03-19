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
                if($request->date) {
                    $date = new Carbon($request->date);
                } else {
                    $date = new Carbon(today());
                }
                $parsedDate = $date->format('Y-m-d');
                $filePath = storage_path("logs/laravel-{$parsedDate}.log");
                $data = [];
                if(File::exists($filePath)) {
                    $data = [
                        'lastModified' => Carbon::parse(date("Y-m-d H:i:s", File::lastModified($filePath))),
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