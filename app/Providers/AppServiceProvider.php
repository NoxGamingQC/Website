<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Model\CustomTheme;
use App\Model\MainConfig;
use App\Model\PageLists;
use App\Model\Theme;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        if (!$request->secure() && $request->header('host') != 'localhost:8000') {
            URL::forceScheme('https');
        }
        

        if(env('GIT_SHA')) {
            $sourceVersion = env('GIT_SHA');
        } else {
            $sourceVersion = 'undefined';
        }

        return view()->share([
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
