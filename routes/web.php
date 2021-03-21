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


Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => 'setlocale'],
    function () {
        Auth::routes();
        if (env('APP_ENV') !== 'production') {
            Route::get('/maintenance', function () {
                return view('maintenance');
            });
        }
    });
    
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
    
    Route::get('/noxgamingqc/overlay/start_stream', function () {
        return view('overlay.start_stream');
    });

    Route::get('/discord', function () {
        return redirect()->to('https://discord.gg/6DGc24x');
    });
    
    Route::get('language/set/{language}', 'LanguageController@index');
    
    Route::group(
        [
            'middleware' => 'Development'],
    function () {
        Route::get('/', function () {
            return redirect(app()->getLocale() . '/home');
        });

        Route::get('/home', function () {
            return redirect(app()->getLocale() . '/home');
        });

        Route::get('/noxbot/data/json/activities', 'NoxBOT\BotActivitiesController@getActivities');
        Route::get('/noxbot/data/json/modules', 'NoxBOT\BotModulesController@getModules');
        Route::get('/noxbot/data/json/subs_modules', 'NoxBOT\BotModulesController@getSubsModules');
        Route::get('/noxbot/data/json/roles_reactions', 'NoxBOT\BotRolesReactionsController@getRolesReactions');
        Route::get('/noxbot/data/json/twitch_lives', 'NoxBOT\BotTwitchLivesController@getTwitchLives');
        
        Route::post('/noxbot/data/json/twitch_lives/{id}', 'NoxBOT\BotTwitchLivesController@postTwitchLives');

        Route::group(
            [
            'prefix' => '{locale}',
            'where' => ['locale' => '[a-zA-Z]{2}'],
            'middleware' => 'setlocale'],
            function () {
                Route::get('/', function () {
                    return redirect('home');
                });

                Route::get('/home', function () {
                    return view('welcome');
                });

                Route::get('/projects', 'ProjectsController@index');

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


                Route::get('/games', 'GamesListController@index');

                Route::get('/noxbot/dashboard', 'NoxBotDashboardController@getDashboard');


                Route::get('/profile/show/{id}', 'UserProfileController@index');

                Route::get('/profile/edit', 'UserProfileController@getEditPage');
                Route::post('/profile/edit', 'UserProfileController@edit');

                Route::get('/contact', 'ContactController@index');

                Route::get('/noxbot/dashboard/{serverID}', 'NoxBotDashboardController@serverDashboard');

                Route::post('/noxbot/data/user/store', 'NoxBotDashboardController@linkDiscord');

                Route::get('/management/modules', 'ManagementController@getModules');
                Route::get('/management/users', 'ManagementController@getUsers');
                Route::get('/management/activities', 'ManagementController@getBotActivities');
                Route::get('/management/tasks', 'ToDoListController@index');
                Route::get('/management/logs', 'LogsController@index');
                Route::get('/management/logs/download', 'LogsController@download');
            }
        );
    }
);