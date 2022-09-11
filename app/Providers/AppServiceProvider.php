<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
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
        if($this->app->environment('production') || env('APP_URL') !== 'http://localhost') {
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
        foreach($pageLists as $key => $value) {
            $inMaintenance = false;
            if($maintenance === true) {
                $inMaintenance = true;
            } else {
                if($this->app->environment('production')) {
                    $inMaintenance = $value->inMaintenance;
                } else {
                    $inMaintenance = false;
                }
            }

            $pageListsArray [$value->slug] = [
                'inMaintenance' => $inMaintenance,
                'description' => $value->Description
            ];
        }

        view()->share('headline', $headline);
        view()->share('mainTheme', $theme);
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
