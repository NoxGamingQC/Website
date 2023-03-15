<?php

namespace App\Recipe;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipe';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function getIngredients() {
        return $this->hasMany(IngredientList::class, 'recipe_id')->orderBy('order', 'asc')->get();
    }

    public function getSteps () {
        return $this->hasMany(RecipeSteps::class, 'recipe_id')->orderBy('order', 'asc')->get();
    }

    public function getCategory() {
        return $this->belongsTo(Categories::class, 'category_id')->first();

    }
}
