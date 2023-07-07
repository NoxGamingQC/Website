<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


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


