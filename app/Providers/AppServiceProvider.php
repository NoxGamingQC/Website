<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Models\CustomTheme;
use App\Models\MainConfig;
use App\Models\PageLists;
use App\Models\Theme;
use App\Models\User;
use Laravel\Cashier\Cashier;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        Cashier::calculateTaxes();
        if (!$request->secure() && $request->header('host') != 'localhost:8000' && $request->header('host') != 'localhost') {
            URL::forceScheme('https');
        }
        if($request->header('host') == 'localhost:8000' || $request->header('host') == 'localhost') {
            $appName = 'Dev';
        } else if($request->header('host') == 'noxgamingqc.ca' || $request->header('host') == 'www.noxgamingqc.ca') {
            $appName = 'NoxGamingQC';
        } else {
            if(explode('/',request()->server('REQUEST_URI'))[1] == 'fr-ca') {
                $appName = 'Services Technologique J.Bédard';
            } else {
                $appName = 'J.Bédard Tech Services';
            }
        }

        if(env('GIT_SHA')) {
            $sourceVersion = env('GIT_SHA');
        } else {
            $sourceVersion = 'undefined';
        }

        return view()->share([
            'appName' => $appName,
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
