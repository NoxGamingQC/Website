<?php

namespace App\Model\Recipe;

use Illuminate\Database\Eloquent\Model;

class RecipeSteps extends Model
{
    protected $table = 'recipe_steps';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
