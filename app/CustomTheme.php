<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomTheme extends Model
{
    protected $table = 'custom_theme';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
