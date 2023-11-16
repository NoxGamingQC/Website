<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DiscordServerConfig extends Model
{
    protected $table = 'discord_server_config';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

}
