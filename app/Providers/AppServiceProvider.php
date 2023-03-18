<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use App\PageLists;
use App\MainConfig;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(env('APP_URL') !== 'http://localhost:8000') {
            \URL::forceScheme('https');
        }

        $mainConfig = MainConfig::all();
        foreach($mainConfig as $key => $value) {
            if($value->Slug == 'theme') {
                $themeName = $value->Value;
            }
            if($value->Slug == 'maintenance') {
                $maintenance = $value->Value;
            }
            if($value->Slug == 'force_theme') {
                $forceTheme = $value->Value;
            }
            if($value->Slug == 'headline_hr') {
                $headlineHr = $value->Value;
            }
            if($value->Slug == 'headline_01') {
                $headline01 = $value->Value;
            }
            if($value->Slug == 'headline_02') {
                $headline02 = $value->Value;
            }
            if($value->Slug == 'headline_socials') {
                $headlineSocials = $value->Value;
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
