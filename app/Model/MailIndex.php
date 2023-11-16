<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MailIndex extends Model
{
    protected $table = 'mail_index';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
