<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Modules;
use App\BotActivities;

class NoxBOTAPI extends Controller
{
    public function getBotActivities()
    {

        $activities = [];
        foreach (BotActivities::orderBy('ID')->get() as $key => $activity) {
            array_push($activities, $activity->Activity);
        }
        return response()->json($activities);
    }
}
