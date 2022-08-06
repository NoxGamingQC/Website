<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GamesList extends Model
{
    protected $table = 'games_list';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
