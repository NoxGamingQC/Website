<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mails extends Model
{
    protected $table = 'mails';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
