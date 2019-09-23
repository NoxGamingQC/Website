<?php

namespace App\Http\Controllers\NoxBOT;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BotActivities;

class BotActivitiesController extends Controller
{
    public function getActivities()
    {

        $activities = [];
        foreach (BotActivities::orderBy('ID')->get() as $key => $activity) {
            array_push($activities, $activity->Activity);
        }
        return response()->json($activities);
    }
}
