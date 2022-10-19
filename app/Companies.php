<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $table = 'companies';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
