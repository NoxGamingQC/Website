<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use App\PageLists;
use App\MainConfig;
use Illuminate\Support\Facades\App;
use URL;

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
        
        $theme = [
            'themeName' => $themeName,
            'force' => $forceTheme
        ];

        $headline = [
            'headline01' => $headline01,
            'headline02' => $headline02,
            'headlineHr' => $headlineHr,
            'headlineSocials' => $headlineSocials
        ];

        $pageLists = PageLists::all();
        $pageListsArray = [];
        if(env('APP_ENV') === 'production') {
            foreach($pageLists as $key => $value) {
                $inMaintenance = false;
                if($maintenance === true) {
                    $inMaintenance = true;
                } else {
                    $inMaintenance = $value->inMaintenance;
                }

                $pageListsArray [$value->slug] = [
                    'inMaintenance' => $inMaintenance,
                    'description' => $value->Description
                ];
            }
            if(Auth::check()) {
                if(Auth::user()->isAdmin || Auth::user()->isModerator || Auth::user()->isDev) {
                    foreach($pageLists as $key => $value) {
                        $pageListsArray [$value->slug] = [
                            'inMaintenance' => false,
                            'description' => $value->Description
                        ];
                    }
                }
            }
        } else {
            foreach($pageLists as $key => $value) {
                $pageListsArray [$value->slug] = [
                    'inMaintenance' => false,
                    'description' => $value->Description
                ];
            }
        }
        if(env('GIT_SHA')) {
            $sourceVersion = env('GIT_SHA');
        } else {
            $sourceVersion = 'undefined';
        }

        view()->share('headline', $headline);
        view()->share('mainTheme', $theme);
        view()->share('sourceVersion', $sourceVersion);
        if($pageListsArray) {
            view()->share('page_lists', $pageListsArray);
        } else {
            return view();
        }
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
