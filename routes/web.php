<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


// Direct links

Route::get('/', function () {
    return redirect(app()->getLocale() . '/home');
});

Route::get('/home', function () {
    return redirect(app()->getLocale() . '/home');
});

Route::get('language/set/{language}', 'LanguageController@index');

//Profile routes
Route::get('/user/{id}', function ($id) {
    return redirect()->to('/' . app()->getLocale() . '/user/' . $id);
});

// Miscellaneous
Route::get('/discord', function () {
    return redirect()->to('https://discord.com/invite/PryKE2Xvrh');
});

Route::get('/startup', function() {
    return redirect()->to('/' . app()->getLocale() . '/startup');
});


// Route that utilize the language
Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-z]{2}-[a-z]{2}'],
    'middleware' => 'setlocale'
], function () {
    Auth::routes();
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Route::get('/', function () {
        return redirect(app()->getLocale() . '/home');
    });

    Route::get('/home', function () {
        return view('pages.welcome')->with(['currentPage' => "home"]);
    });

    Route::get('projects', 'ProjectsController@index');
    Route::get('/user/{id}', 'UserProfileController@index');
    Route::get('/user/me/edit', 'UserProfileController@edit');
    Route::post('/user/me/save', 'UserProfileController@save');

    // Tools routes
    Route::get('store', 'StoreController@index');
    Route::get('tools/mensual_budget', 'Tools\BudgetController@index');
    Route::get('tools/demo_unit', 'Tools\TechnologyController@demounit');

    // Miscellaneous
    Route::get('/startup', function() {
        return view('pages.startup')->with(['currentPage' => 'startup']);
    });

});













// Old routes to check
/* 
Route::get('/pos/{slug}', 'POSController@index');
Route::post('/pos/validate/{pos}/{pin}/{option}', 'POSController@validateCashier');
Route::get('/pos/{slug}/menu/{cashier_id}', 'POSController@menu');
Route::get('/pos/{slug}/getInventory/{itemID}', 'POSController@getInventoryCount');

Route::get('/pos/{slug}/pay', 'POSController@registerPayment');

Route::middleware(['cors'])->group(function () {
    Route::get('/mail/show/{uid}', 'Mails\MailController@showContent');
    // API ROUTES
    Route::post('/api/points/add', 'API\PointsController@addPoints');
    Route::post('/api/link/new', 'UserProfileController@newLink');
    Route::post('/api/discord/update', 'API\DiscordController@update');
    Route::post('/api/discord/server/update', 'API\DiscordController@updateServer');
    Route::get('/api/discord/config/get/{id}', 'API\DiscordController@getServerConfig');
    Route::get('/api/check_state', 'API\UserController@checkState');
    Route::get('/api/check_state/{id}', 'API\UserController@checkStateWithID');


    // NoxBOT routes
    Route::post('/api/noxbot/points/add', 'NoxBOT\PointSystemController@addPoints');
    Route::get('/api/noxbot/modules', 'NoxBOT\BotModulesController@getModules');
    Route::get('/api/noxbot/json/subs_modules', 'NoxBOT\BotModulesController@getSubsModules');
    Route::get('/api/noxbot/roles_reactions', 'NoxBOT\BotRolesReactionsController@getRolesReactions');
    Route::get('/api/noxbot/twitch_lives', 'NoxBOT\BotTwitchLivesController@getTwitchLives');
    Route::post('/api/noxbot/twitch_lives/{id}', 'NoxBOT\BotTwitchLivesController@postTwitchLives');
});


    Route::get('/mailbox', function () {
        return redirect()->to('/' . app()->getLocale() . '/mailbox');           
    });
    Route::post('/mail/receive', 'Mails\MailController@receive');
    Route::post('/mail/send', 'Mails\MailController@sendMail');
    //Route::get('/mail/test', 'Mails\MailController@testMail');
    Route::get('/cookbook', function (Request $request) {
        if($request->key) {
            return redirect()->to('/' . app()->getLocale() . '/cookbook?key='. $request->key);
        } else {
            return redirect()->to('/' . app()->getLocale() . '/cookbook');
        }
    });
    Route::post('/recipe/add', 'RecipeController@saveRecipe');
    Route::post('/recipe/edit', 'RecipeController@saveEditedRecipe');

    Route::group([
        'prefix' => '{locale}',
        'where' => ['locale' => '[a-z]{2}-[a-z]{2}'],
        'middleware' => 'setlocale'
    ], function () {
        Auth::routes();

        
    });
    
    // No Languages routes
   
    Route::post('/management/settings', 'SettingsController@post');
    Route::post('/profile/update_state', 'UserProfileController@updateState');

    // Route with redirections
    Route::get('/guilded', function () {
        return redirect()->to('https://guilded.gg/ngst');
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

    Route::get('/projects/minecraft', function () {
        return redirect(app()->getLocale() . '/projects/minecraft');
    });

    //Post routes
    Route::post('/profile/link', 'UserProfileController@link');
    Route::post('/profile/edit', 'UserProfileController@edit');

    Route::group(
        [
        'prefix' => '{locale}',
        'where' => ['locale' => '[a-z]{2}-[a-z]{2}'],
        'middleware' => 'setlocale'],
        function () {
            //Route that require language

            

            /*
              
                ABOUT US ROUTES
              
            *
            Route::get('about_us/twitch', 'TwitchController@index');
            Route::get('about_us/youtube', 'YouTubeController@index');

            Route::get('about_us/teams', function () {
                return view('view.about_us.teams');
            });

            Route::get('about_us/partners', function () {
                return view('view.about_us.partners');
            });

            Route::get('about_us/contact_us', 'ContactController@index');
            Route::post('/contact/form', 'ContactController@sendContactUsEmail');

            //Projects Routes
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
              
            *
            //Cookbook routes
            Route::get('/cookbook', 'RecipeController@cookbook');
            Route::get('/cookbook/{category}', 'RecipeController@category');
            Route::get('/recipe/add', 'RecipeController@addRecipe');
            Route::get('/recipe/{id}', 'RecipeController@recipe');
            Route::get('/recipe/edit/{id}', 'RecipeController@editRecipe');
            Route::get('/company/kiosk/refresh', 'KioskController@refreshData');
            Route::get('/fun/pokemon/{slug}', 'Website\Fun\PokemonViewController@index');

            Route::get('/noxbot/dashboard', 'NoxBotController@index');
            Route::get('/noxbot/dashboard/{id}', 'NoxBotController@getDashboard');

            /*
              
                MANAGEMENT ROUTES
              
            *
            Route::get('/management/modules', 'ManagementController@getModules');
            Route::get('/management/users', 'ManagementController@getUsers');
            Route::get('/management/activities', 'ManagementController@getBotActivities');
            Route::get('/management/tasks', 'ToDoListController@index');
            Route::get('/management/logs', 'LogsController@index');
            Route::get('/management/logs/download', 'LogsController@download');
            Route::get('/management/settings', 'SettingsController@index');
            
            /*
              
                MAILING ROUTES
              
            *
            Route::get('/mailbox', 'Mails\MailController@index');
            /*
              
                OTHER ROUTES
              
            *
            Route::get('/stream/commands', 'BotCommandsController@index');

            Route::get('/search', 'SearchController@index');
            Route::get('/search', 'SearchController@search');

            Route::get('/guilded/subscription', function () {
                return view('guilded.subscription');
            });


        });
    }
);
*/