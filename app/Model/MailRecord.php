<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MailRecord extends Model
{
    protected $table = 'mail_records';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'mailbox_id'
    ];
}
