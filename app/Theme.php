<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $table = 'theme';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
