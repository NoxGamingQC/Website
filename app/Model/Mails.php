<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Mailables\Headers;

class Mails extends Model
{
    protected $table = 'mails';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function headers(): Headers
    {
        return new Headers(
            text: [
                'List-Unsubscribe' => '<https://www.noxgamingqc.ca/unsubscribe>',
            ],
        );
    }
}
