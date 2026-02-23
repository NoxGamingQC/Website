<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mailboxes extends Model
{
    protected $table = 'mailboxes';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    
    protected $fillable = [
        'user_id'
    ];
}
