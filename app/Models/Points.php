<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Points extends Model
{
    protected $table = 'users_points';

    protected $fillable = [
        'user_id',
        'quantity',
        'comment',
    ];

    /**
     * Get all points for a user with user name
     */
    public static function getPoints(int $userID)
    {
        return self::join('users', 'users.id', '=', 'users_points.user_id')
            ->where('users_points.user_id', $userID)
            ->orderByDesc('users_points.id')
            ->get(['users_points.user_id', 'users.name', 'users_points.quantity', 'users_points.comment']);
    }

    /**
     * Get the last $quantity points logs for a user
     */
    public static function getPointsLogs(int $userID, ?int $quantity = null)
    {
        $query = self::join('users', 'users.id', '=', 'users_points.user_id')
            ->where('users_points.user_id', $userID)
            ->orderByDesc('users_points.id')
            ->select('users_points.user_id', 'users.name', 'users_points.quantity', 'users_points.comment');

        return $quantity ? $query->take($quantity)->get() : $query->get();
    }

    /**
     * Calculate the total points for a user
     */
    public static function getTotalPoints(int $userID): int
    {
        return self::where('user_id', $userID)->sum('quantity');
    }
}