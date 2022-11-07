<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    Route::get('/company/kiosk/{id}', 'NGST\KioskController@index');
    Route::get('/company/kiosk/{id}/refresh', 'NGST\KioskController@refreshData');


    Route::group([
        'prefix' => '{locale}',
        'where' => ['locale' => '[a-z]{2}-[a-z]{2}'],
        'middleware' => 'setlocale'
    ], function () {
        Auth::routes();
        if (env('APP_ENV') !== 'production') {
            Route::get('/maintenance', function () {
                return view('maintenance');
            });
        }
    });
    
    // No Languages routes
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Route::get('/noxgamingqc/overlay/start_stream', function () {
        return view('overlay.start_stream');
    });

    Route::get('language/set/{language}', 'LanguageController@index');
    Route::post('/management/settings', 'SettingsController@post');
    Route::post('/profile/update_state', 'UserProfileController@updateState');

    // Route with redirections
    Route::get('/guilded', function () {
        return redirect()->to('https://guilded.gg/ngst');
    });

    Route::get('/discord', function () {
        return redirect()->to('https://discord.com/invite/PryKE2Xvrh');
    });

    Route::get('/pst/discord', function () {
        return redirect()->to('https://discord.com/invite/SAXsDwaR');
    });
    
    Route::group([
            'middleware' => 'Development'
    ], function () {
    Route::get('/', function () {
        return redirect(app()->getLocale() . '/');
    });

    Route::get('/home', function () {
        return redirect(app()->getLocale() . '/');
    });

    // NoxBOT routes
    Route::get('/noxbot/data/json/activities', 'NoxBOT\BotActivitiesController@getActivities');
    Route::post('/noxbot/data/points/add', 'NoxBOT\PointSystemController@addPoints');
    Route::get('/noxbot/data/json/modules', 'NoxBOT\BotModulesController@getModules');
    Route::get('/noxbot/data/json/subs_modules', 'NoxBOT\BotModulesController@getSubsModules');
    Route::get('/noxbot/data/json/roles_reactions', 'NoxBOT\BotRolesReactionsController@getRolesReactions');
    Route::get('/noxbot/data/json/twitch_lives', 'NoxBOT\BotTwitchLivesController@getTwitchLives');
    Route::post('/noxbot/data/json/twitch_lives/{id}', 'NoxBOT\BotTwitchLivesController@postTwitchLives');

    //Post routes
    Route::post('/profile/edit', 'UserProfileController@edit');

    Route::group(
        [
        'prefix' => '{locale}',
        'where' => ['locale' => '[a-z]{2}-[a-z]{2}'],
        'middleware' => 'setlocale'],
        function () {
            //Route that require language
            Route::get('/', function () {
                return view('welcome');
            });

            Route::get('/home', function () {
                return redirect(app()->getLocale() . '/');
            });

            Route::get('/projects', 'ProjectsController@index');

            Route::get('/teams', function () {
                return view('teams');
            });

            Route::get('/partners', function () {
                return view('partners');
            });

            Route::get('/twitch', 'TwitchController@index');
            Route::get('/youtube', 'YouTubeController@index');

            Route::get('/stream/commands', 'BotCommandsController@index');

            Route::get('/search', 'SearchController@index');
            Route::get('/search', 'SearchController@search');

            Route::get('/noxbot', 'NoxBotDashboardController@index');
            Route::post('/noxbot', 'NoxBotDashboardController@post');

            Route::get('/noxbot/dashboard', function () {
                return view('noxbot_dashboard');
            });

            Route::get('/guilded/subscription', function () {
                return view('guilded.subscription');
            });

            Route::get('/games', 'GamesListController@index');
            Route::post('/games/add', 'GamesListController@addgame');
            Route::post('/games/edit', 'GamesListController@editgame');
            Route::post('/games/remove', 'GamesListController@removegame');
            Route::post('/console/add', 'GamesListController@addconsole');
            Route::post('/console/remove', 'GamesListController@removeconsole');

            Route::get('/noxbot/dashboard', 'NoxBotDashboardController@getDashboard');


            Route::get('/profile/show/{id}', 'UserProfileController@index');

            Route::get('/profile/edit', 'UserProfileController@getEditPage');

            Route::get('/contact', 'ContactController@index');
            Route::post('/contact/form', 'ContactController@sendContactUsEmail');

            Route::get('/noxbot/dashboard/{serverID}', 'NoxBotDashboardController@serverDashboard');

            Route::post('/noxbot/data/user/store', 'NoxBotDashboardController@linkDiscord');

            //Management routes
            Route::get('/management/modules', 'ManagementController@getModules');
            Route::get('/management/users', 'ManagementController@getUsers');
            Route::get('/management/activities', 'ManagementController@getBotActivities');
            Route::get('/management/tasks', 'ToDoListController@index');
            Route::get('/management/logs', 'LogsController@index');
            Route::get('/management/logs/download', 'LogsController@download');
            Route::get('/management/settings', 'SettingsController@index');

            //NGST routes
            Route::get('/ngst/store', 'SquareController@index');
            Route::get('/ngst/services', function () {
                return view('ngst.services');
            });

            //PositivityST routes
        });
    }
);
