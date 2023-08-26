<?php

namespace App\Recipe;

use Illuminate\Database\Eloquent\Model;

class IngredientList extends Model
{
    protected $table = 'recipe_ingredient_list';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
