<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imap extends Model
{
    protected $table = 'imap';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
