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
    //Route::get('/company/kiosk/{id}/refresh', 'NGST\KioskController@refreshData');
    Route::post('/mail/receive', 'Mails\MailController@receive');
    Route::post('/mail/send', 'Mails\MailController@sendMail');
    /*Route::get('/mail/test', function() {
        return view('emails.newsletter');
    });*/
    Route::get('/kiosk/cookbook', function () {
        return redirect()->to('/fr-ca/kiosk/cookbook');
    });

    Route::get('/company/kiosk/refresh', 'NGST\KioskController@refreshData');


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

    // Gouliram routes
    Route::post('/gouliram/contact', 'Gouliram\ContactController@contactUsEmail');
    
    //Other routes
    Route::group([
            'middleware' => 'Development'
    ], function () {
    Route::get('/', function () {
        return redirect(app()->getLocale() . '/');
    });

    Route::get('/home', function () {
        return redirect(app()->getLocale() . '/');
    });

    Route::get('/projects/minecraft', function () {
        return redirect(app()->getLocale() . '/projects/minecraft');
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
                return view('noxgamingqc.welcome');
            });

            Route::get('/home', function () {
                return redirect(app()->getLocale() . '/');
            });

            Route::get('/projects', 'ProjectsController@index');

            Route::get('/teams', function () {
                return view('noxgamingqc.about_me.teams');
            });
            
            Route::get('/kiosk/cookbook', 'NGST\RecipeController@cookbook');
            Route::get('/kiosk/cookbook/{category}', 'NGST\RecipeController@category');
            Route::get('/kiosk/recipe/{id}', 'NGST\RecipeController@recipe');
            Route::get('/company/kiosk/refresh', 'NGST\KioskController@refreshData');

            Route::get('/partners', function () {
                return view('noxgamingqc.streaming.partners');
            });

            Route::get('/twitch', 'TwitchController@index');
            Route::get('/youtube', 'YouTubeController@index');
            Route::get('/projects/minecraft', 'Projects\MinecraftController@index');

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
            Route::get('/profile/mail', 'Mails\MailController@index');
            Route::get('/profile/mail/{id}', 'Mails\MailController@show');
            Route::get('/profile/mail/{id}/content', 'Mails\MailController@showContent');
            Route::get('/profile/mail/{id}/delete', 'Mails\MailController@delete');

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
            Route::get('/ngst/store/item/{id}', 'SquareController@showItem');

            //PositivityST routes
        });
    }
);
