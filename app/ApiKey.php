<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiKey extends Model
{
    protected $table = 'api_key';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
