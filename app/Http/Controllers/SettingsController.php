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

                $headline01 = MainConfig::where('Slug', 'headline_01')->first();
                $headline01->Value = $request->headline01;
                $headline01->save();

                $headline02 = MainConfig::where('Slug', 'headline_02')->first();
                $headline02->Value = $request->headline02;
                $headline02->save();

                
                $headlineHr = MainConfig::where('Slug', 'headline_hr')->first();
                $headlineHr->Value = $request->headlineHr;
                $headlineHr->save();

                $headlineSocials = MainConfig::where('Slug', 'headline_socials')->first();
                $headlineSocials->Value = $request->headlineSocials;
                $headlineSocials->save();

                return 0;
            }
        }
        abort(403);
    }
}