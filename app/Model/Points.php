<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Points extends Model
{
    protected $table = 'users_points';

    static public function getPoints($userID) {
        $points = User::join('users_points', 'users.id', '=', 'users_points.user_id')
        ->where('users_points.user_id', '=', $userID)
        ->orderBy('users_points.id', 'desc')
        ->get(['users_points.user_id', 'users.name', 'users_points.quantity', 'users_points.comment']);
        return $points;
    }

    static public function getPointsLogs($userID, $quantity = null) {
        if($quantity) {
            $points = User::join('users_points', 'users.id', '=', 'users_points.user_id')
                ->where('users_points.user_id', '=', $userID)
                ->orderBy('users_points.id', 'desc')
                ->take($quantity)
                ->get(['users_points.user_id', 'users.name', 'users_points.quantity', 'users_points.comment']);
            return $points;
        }
        $points = User::join('users_points', 'users.id', '=', 'users_points.user_id')
                ->where('users_points.user_id', '=', $userID)
                ->orderBy('users_points.id', 'desc')
                ->get(['users_points.user_id', 'users.name', 'users_points.quantity', 'users_points.comment']);
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
