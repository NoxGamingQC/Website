<?php

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\Minecraft;
use App\Http\Resources\NoxBOT;

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

Route::get('/user/{username}', function (string $username) {
    return new UserResource($username);
});

// NoxBOT routes
Route::get('/noxbot/activities', function () {
    return new NoxBOT\ActivityListResource(null);
});

Route::get('/noxbot/activity', function () {
    return new NoxBOT\ActivityResource(null);
});


// Minecraft routes
Route::get('/minecraft/points/{uuid}', function (string $uuid) {
    return new Minecraft\GetPointResource($uuid);
});