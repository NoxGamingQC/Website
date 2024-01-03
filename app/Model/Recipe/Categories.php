<?php

namespace App\Model\Recipe;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'recipe_categories';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
