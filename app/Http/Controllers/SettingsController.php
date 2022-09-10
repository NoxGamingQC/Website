<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\MainConfig;
use Carbon\Carbon;

class SettingsController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            if (Auth::user()->isAdmin || Auth::user()->isMod || Auth::user()->isDev) {
                return view('management.settings');
            }
        }
        abort(403);
    }

    public function post(Request $request) {
        if (Auth::user()) {
            if (Auth::user()->isAdmin || Auth::user()->isMod || Auth::user()->isDev) {

                $theme = MainConfig::where('Slug', 'theme')->first();
                $theme->Value = $request->theme;
                $theme->save();

                $forceTheme = MainConfig::where('Slug', 'force_theme')->first();
                $forceTheme->Value = $request->forceTheme;
                $forceTheme->save();
                return 0;
            }
        }
        abort(403);
    }
}