<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MailAttachment extends Model
{
    protected $table = 'mail_attachments';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $fillable = [
        'mail_id',
        'filename',
        'original_name',
        'mime_type',
        'file_size',
        'content_id',
        'disposition',
        'storage_path'
    ];
}
