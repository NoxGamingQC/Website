<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kiosk extends Model
{
    protected $table = 'kiosk';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
