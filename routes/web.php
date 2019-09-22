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
Route::get('/', function () {
    return redirect(app()->getLocale() . '/home');
});

Route::get('/home', function () {
    return redirect(app()->getLocale() . '/home');
});

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

        Route::get('/projects', function () {
            return view('projects');
        });

        Route::get('/stream', function () {
            return view('stream');
        });

        Route::get('/stream/commands', function () {
            return view('commands');
        });


        Route::get('/noxbot', function () {
            return view('noxbot');
        });

        Route::get('/noxbot/dashboard', function () {
            return view('noxbot_dashboard');
        });


        Route::get('/games', function () {
            return view('games');
        });

        Route::get('/noxbot/dashboard', 'NoxBotDashboardController@index');


        Route::get('/profile/show/{id}', 'UserProfileController@index');

        Route::get('/profile/edit', 'UserProfileController@edit');

        Route::get('/contact', function () {
            return view('contact');
        });

        Route::get('/noxbot/dashboard/{serverID}', 'NoxBotDashboardController@serverDashboard');

        Auth::routes();
        Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

        Route::post('/noxbot/data/user/store', 'NoxBotDashboardController@linkDiscord');

        Route::get('/management/modules', 'ManagementController@getModules');
        Route::get('/management/users', 'ManagementController@getUsers');
        Route::get('/management/activities', 'ManagementController@getBotActivities');
    }
);
