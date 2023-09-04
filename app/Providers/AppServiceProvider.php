<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use App\CustomTheme;
use App\MainConfig;
use App\PageLists;
use App\Theme;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       if (env('APP_ENV') == 'production') {
            URL::forceScheme('https');
        }
        $mainConfig = MainConfig::all();
        foreach($mainConfig as $key => $value) {
            if($value->slug == 'theme') {
                $themeName = $value->value;
            }
            if($value->slug == 'maintenance') {
                $maintenance = $value->value;
            }
            if($value->slug == 'force_theme') {
                $forceTheme = $value->value;
            }
            if($value->slug == 'headline_hr') {
                $headlineHr = $value->value;
            }
            if($value->slug == 'headline_01') {
                $headline01 = $value->value;
            }
            if($value->slug == 'headline_02') {
                $headline02 = $value->value;
            }
            if($value->slug == 'headline_socials') {
                $headlineSocials = $value->value;
            }
        }

        $headline = [
            'headline01' => $headline01,
            'headline02' => $headline02,
            'headlineHr' => $headlineHr,
            'headlineSocials' => $headlineSocials
        ];

        if(env('GIT_SHA')) {
            $sourceVersion = env('GIT_SHA');
        } else {
            $sourceVersion = 'undefined';
        }


        if(!$forceTheme) {
            $officialtheme = Theme::where('name', '=', $themeName)->first();
            if($officialtheme) {
                $theme =  collect([
                    'name' => $themeName,
                    'force' => $forceTheme,
                    'custom' => Auth::check() ? (count(CustomTheme::where('owner_id', '=', Auth::user()->id)->first()) ? true : false) : false,
                    'primary_text' => (hexdec(substr($officialtheme->primary, 0, 2)) * 0.266 + hexdec(substr($officialtheme->primary, 2, 2)) * 0.587 + hexdec(substr($officialtheme->primary, 4, 2)) * 0.114) > 186 ? '000000' : 'FFFFFF',
                    'background_text' => (hexdec(substr($officialtheme->background, 0, 2)) * 0.266 + hexdec(substr($officialtheme->background, 2, 2)) * 0.587 + hexdec(substr($officialtheme->background, 4, 2)) * 0.114) > 186 ? '000000' : 'FFFFFF',
                    'background' => $officialtheme->background,
                    'primary' => $officialtheme->primary,
                    'blue' => $officialtheme->blue,
                    'green' => $officialtheme->green,
                    'yellow' => $officialtheme->yellow,
                    'red' => $officialtheme->red,
                    'gray' => $officialtheme->gray
                ]);
            }
        } else {
            if(Auth::check()) {
                if(count(CustomTheme::where('owner_id', '=', Auth::user()->id)->first())) {
                    $customTheme = CustomTheme::where('owner_id', '=', Auth::user()->id)->first();
                    $theme =  collect([
                        'name' => 'custom',
                        'force' => false,
                        'background' => $customTheme->background,
                        'primary' => $customTheme->primary,
                        'primary_text' => (hexdec(substr($customTheme->primary, 0, 2)) * 0.266 + hexdec(substr($customTheme->primary, 2, 2)) * 0.587 + hexdec(substr($customTheme->primary, 4, 2)) * 0.114) > 186 ? '000000' : 'FFFFFF',
                        'background_text' => (hexdec(substr($customTheme->background, 0, 2)) * 0.266 + hexdec(substr($customTheme->background, 2, 2)) * 0.587 + hexdec(substr($customTheme->background, 4, 2)) * 0.114) > 186 ? '000000' : 'FFFFFF',
                        'blue' => $customTheme->blue,
                        'green' => $customTheme->green,
                        'yellow' => $customTheme->yellow,
                        'red' => $customTheme->red,
                        'gray' => $customTheme->gray
                    ]);
                }
            }
        }
        if(!isset($theme)) {
            $officialtheme = Theme::where('name', '=', $themeName)->first();
            if($officialtheme) {
                $theme =  collect([
                    'name' => $themeName,
                    'force' => $forceTheme,
                    'custom' => Auth::check() ? (count(CustomTheme::where('owner_id', '=', Auth::user()->id)->first()) ? true : false) : false,
                    'background' => $officialtheme->background,
                    'primary' => $officialtheme->primary,
                    'primary_text' => (hexdec(substr($officialtheme->primary, 0, 2)) * 0.266 + hexdec(substr($officialtheme->primary, 2, 2)) * 0.587 + hexdec(substr($officialtheme->primary, 4, 2)) * 0.114) > 186 ? '000000' : 'FFFFFF',
                    'background_text' => (hexdec(substr($officialtheme->background, 0, 2)) * 0.266 + hexdec(substr($officialtheme->background, 2, 2)) * 0.587 + hexdec(substr($officialtheme->background, 4, 2)) * 0.114) > 186 ? '000000' : 'FFFFFF',
                    'blue' => $officialtheme->blue,
                    'green' => $officialtheme->green,
                    'yellow' => $officialtheme->yellow,
                    'red' => $officialtheme->red,
                    'gray' => $officialtheme->gray
                ]);
            }
        }
        
        /*$theme = collect([
            'name' => $themeName,
            'force' => $forceTheme,
            'custom' => Auth::check() ? (count(CustomTheme::where('owner_id', '=', Auth::user()->id)->first()) ? true : false) : false,
            'background' => '555555',
            'primary' => 'ff8800',
            'primary_text' => (hexdec(substr('ff8800', 0, 2)) * 0.266 + hexdec(substr('ff8800', 2, 2)) * 0.587 + hexdec(substr('ff8800', 4, 2)) * 0.114) > 186 ? '000000' : 'FFFFFF',
            'background_text' => (hexdec(substr('555555', 0, 2)) * 0.266 + hexdec(substr('555555', 2, 2)) * 0.587 + hexdec(substr('555555', 4, 2)) * 0.114) > 186 ? '000000' : 'FFFFFF',
            'blue' => '0000FF',
            'green' => '00FF00',
            'yellow' => 'FFFF00',
            'red' => 'FFFF00',
            'gray' => 'aaaaaa'
        ]);*/

        return view()->share([
            'theme' => json_decode($theme->toJson()),
            'headline' => $headline,
            'sourceVersion' => $sourceVersion
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
