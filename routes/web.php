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
     return redirect('home');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/partnership', function () {
    return view('partnership');
});

Route::get('/positivity_stream_team', function () {
    return view('positivity_stream_team');
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

Route::get('/noxbot/dashboard', 'NoxBotDashboardController@index');


Route::get('/profile/{id}', 'UserProfileController@index');

Route::get('/profile/edit', 'UserProfileController@edit');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/noxbot/dashboard/{serverID}', 'NoxBotDashboardController@serverDashboard');

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );

Route::post('/noxbot/data/user/store', 'NoxBotDashboardController@linkDiscord');
