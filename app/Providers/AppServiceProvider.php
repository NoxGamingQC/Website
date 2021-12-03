<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\PageLists;

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

        $pageLists = PageLists::all();
        $pageListsArray = [];
        foreach($pageLists as $key => $value) {
            if($this->app->environment('production')) {
                $inMaintenance = $value->inMaintenance;
            } else {
                $inMaintenance = false;
            }
            $pageListsArray [$value->slug] = [
                'inMaintenance' => $inMaintenance,
                'description' => $value->Description
            ];
        }
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
