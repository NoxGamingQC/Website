<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MailAttachment extends Model
{
    protected $table = 'mail_attachments';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
