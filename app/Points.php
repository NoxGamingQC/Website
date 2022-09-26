<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Points extends Model
{
    protected $table = 'points';

    static public function getPoints($userID) {
        $points = User::join('points', 'users.id', '=', 'points.UserID')
        ->where('points.UserID', '=', $userID)
        ->get(['points.UserID', 'users.name', 'points.Quantity', 'points.Comment']);
        return $points;
    }

    static public function getTotalPoints($userID) {
        $pointTotal = 0;
        $pointsArray = Points::getPoints($userID);

        foreach ($pointsArray as $key => $points) {
            $pointTotal += $points->Quantity;
        }

        return $pointTotal;
    }
}
