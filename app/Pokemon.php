<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $table = 'pokemon';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
