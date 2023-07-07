<?php

use Illuminate\Http\Request;

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

Route::middleware(['cors'])->group(function () {
    // API ROUTES
        
    Route::get('/api/check_state', 'API\UserController@checkState');
    Route::get('/api/check_state/{id}', 'API\UserController@checkStateWithID');
    Route::get('/api/minecraft/points/{user}', 'API\PointsController@getMinecraftPoints');
    Route::post('/api/minecraft/points/{user}/{apiKey}', 'API\PointsController@addMinecraftPoints');


    // NoxBOT routes
    Route::get('/api/noxbot/activities', 'NoxBOT\BotActivitiesController@getActivities');
    Route::post('/api/noxbot/points/add', 'NoxBOT\PointSystemController@addPoints');
    Route::get('/api/noxbot/modules', 'NoxBOT\BotModulesController@getModules');
    Route::get('/api/noxbot/json/subs_modules', 'NoxBOT\BotModulesController@getSubsModules');
    Route::get('/api/noxbot/roles_reactions', 'NoxBOT\BotRolesReactionsController@getRolesReactions');
    Route::get('/api/noxbot/twitch_lives', 'NoxBOT\BotTwitchLivesController@getTwitchLives');
    Route::post('/api/noxbot/twitch_lives/{id}', 'NoxBOT\BotTwitchLivesController@postTwitchLives');
});


    Route::get('/company/kiosk/{id}', 'NGST\KioskController@index');
    //Route::get('/company/kiosk/{id}/refresh', 'NGST\KioskController@refreshData');
    Route::post('/mail/receive', 'Mails\MailController@receive');
    Route::post('/mail/send', 'Mails\MailController@sendMail');
    /*Route::get('/mail/test', function() {
        return view('emails.newsletter');
    });*/
    Route::get('/kiosk/cookbook', function (Request $request) {
        if($request->kiosk_key) {
            return redirect()->to('/fr-ca/kiosk/cookbook?kiosk_key='. $request->kiosk_key);
        } else {
            return redirect()->to('/fr-ca/kiosk/cookbook');
        }
    });
    Route::post('/recipe/add', 'NGST\RecipeController@saveRecipe');

    Route::get('/company/kiosk/refresh', 'NGST\KioskController@refreshData');


    Route::group([
        'prefix' => '{locale}',
        'where' => ['locale' => '[a-z]{2}-[a-z]{2}'],
        'middleware' => 'setlocale'
    ], function () {
        Auth::routes();
        if (env('APP_ENV') !== 'production') {
            Route::get('/maintenance', function () {
                if(Auth::check()) {
                    if(Auth::user()->isAdmin || Auth::user()->isModerator || Auth::user()->isDev) {
                        return redirect(app()->getLocale() . '/home');
                    }
                }
                return view('maintenance');
            });
        }
    });
    
    // No Languages routes
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

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
        return redirect(app()->getLocale() . '/home');
    });

    Route::get('/home', function () {
        return redirect(app()->getLocale() . '/home');
    });

    Route::get('/projects/minecraft', function () {
        return redirect(app()->getLocale() . '/projects/minecraft');
    });

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
                return redirect(app()->getLocale() . '/home');
            });

            Route::get('/home', function () {
                return view('view.welcome');
            });

            /*
              
                ABOUT US ROUTES
              
            */
            Route::get('about_us/twitch', 'TwitchController@index');
            Route::get('about_us/youtube', 'YouTubeController@index');

            Route::get('about_us/teams', function () {
                return view('view.about_us.teams');
            });

            Route::get('about_us/partners', function () {
                return view('view.about_us.partners');
            });

            Route::get('about_us/contact', 'ContactController@index');
            Route::post('/contact/form', 'ContactController@sendContactUsEmail');

            //Projects Routes
            Route::get('about_us/projects', 'ProjectsController@index');
            Route::get('about_us/projects/minecraft', 'Projects\MinecraftController@index');
            //Games Routes
            Route::get('about_us/games', 'GamesListController@index');
            Route::post('/games/add', 'GamesListController@addgame');
            Route::post('/games/edit', 'GamesListController@editgame');
            Route::post('/games/remove', 'GamesListController@removegame');
            Route::post('/console/add', 'GamesListController@addconsole');
            Route::post('/console/remove', 'GamesListController@removeconsole');


            /*
              
                MISCS ROUTES
              
            */
            //Cookbook routes
            Route::get('/cookbook', 'NGST\RecipeController@cookbook');
            Route::get('/cookbook/{category}', 'NGST\RecipeController@category');
            Route::get('/recipe/{id}', 'NGST\RecipeController@recipe');
            Route::get('/recipe/add', 'NGST\RecipeController@addRecipe');
            Route::get('/recipe/edit/{id}', 'NGST\RecipeController@editRecipe');
            Route::get('/company/kiosk/refresh', 'NGST\KioskController@refreshData');

            
            //NGST routes
            Route::get('/store', 'SquareController@index');
            Route::get('/store/item/{id}', 'SquareController@showItem');

            /*
              
                PROFILES ROUTES
              
            */
            Route::get('/profile/show/{id}', 'UserProfileController@index');

            Route::get('/profile/edit', 'UserProfileController@getEditPage');
            Route::get('/profile/mail', 'Mails\MailController@index');
            Route::get('/profile/mail/{id}', 'Mails\MailController@show');
            Route::get('/profile/mail/{id}/content', 'Mails\MailController@showContent');
            Route::get('/profile/mail/{id}/delete', 'Mails\MailController@delete');


            Route::get('/noxbot/dashboard/{serverID}', 'NoxBotDashboardController@serverDashboard');

            Route::post('/noxbot/data/user/store', 'NoxBotDashboardController@linkDiscord');

            /*
              
                MANAGEMENT ROUTES
              
            */
            Route::get('/management/modules', 'ManagementController@getModules');
            Route::get('/management/users', 'ManagementController@getUsers');
            Route::get('/management/activities', 'ManagementController@getBotActivities');
            Route::get('/management/tasks', 'ToDoListController@index');
            Route::get('/management/logs', 'LogsController@index');
            Route::get('/management/logs/download', 'LogsController@download');
            Route::get('/management/settings', 'SettingsController@index');
            
            /*
              
                OTHER ROUTES
              
            */
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

            Route::get('/noxbot/dashboard', 'NoxBotDashboardController@getDashboard');


        });
    }
);
