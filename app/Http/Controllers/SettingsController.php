<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Model\MainConfig;

class SettingsController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            if (Auth::user()->is_management) {
                return view('view.management.settings');
            }
        }
        abort(403);
    }

    public function post(Request $request) {
        if (Auth::user()) {
            if (Auth::user()->is_management) {

                $theme = MainConfig::where('slug', 'theme')->first();
                $theme->value = $request->theme;
                $theme->save();

                $forceTheme = MainConfig::where('slug', 'force_theme')->first();
                $forceTheme->value = $request->forceTheme;
                $forceTheme->save();

                $headline01 = MainConfig::where('slug', 'headline_01')->first();
                $headline01->value = $request->headline01;
                $headline01->save();

                $headline02 = MainConfig::where('slug', 'headline_02')->first();
                $headline02->value = $request->headline02;
                $headline02->save();

                
                $headlineHr = MainConfig::where('slug', 'headline_hr')->first();
                $headlineHr->value = $request->headlineHr;
                $headlineHr->save();

                $headlineSocials = MainConfig::where('slug', 'headline_socials')->first();
                $headlineSocials->value = $request->headlineSocials;
                $headlineSocials->save();

                return 0;
            }
        }
        abort(403);
    }
}