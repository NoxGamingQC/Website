<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KioskKey extends Model
{
    protected $table = 'kiosk_key';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
