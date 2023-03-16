<?php

namespace App\Http\Controllers\NGST;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Recipe\Categories;
use App\Recipe\Recipe;
use Carbon\Carbon;

class RecipeController extends Controller
{
    public function cookbook() {
        $categories = Categories::all();

        return view('ngst.kiosk.cookbook.cookbook')->with([
            'kiosk' => 'true',
            'categories' => $categories,
            'recipe' => true,
            'isRecipe' => false,
            'lastLink' => '/' . app()->getLocale() . '/kiosk/cookbook',
        ]);
    }

    public function category($language, $id) {
        $category = Categories::findOrFail($id);
        $recipes = Recipe::where('category_id', $id)->get();

        return view('ngst.kiosk.cookbook.categories')->with([
            'kiosk' => 'true',
            'category' => $category,
            'recipes' => $recipes,
            'isRecipe' => false,
            'lastLink' => '/' . app()->getLocale() . '/kiosk/cookbook',
        ]);
    }

    public function recipe($language, $id) {
        $recipe = Recipe::findOrFail($id);
        $recipe->category = $recipe->getCategory();
        $recipe->ingredients = $recipe->getIngredients();
        $recipe->steps = $recipe->getSteps();

        return view('ngst.kiosk.cookbook.recipe')->with([
            'kiosk' => 'true',
            'isRecipe' => true,
            'recipe' => $recipe,
            'lastLink' => '/' . app()->getLocale() . '/kiosk/cookbook/' . $recipe->category->id,
        ]);
    }
    public function addRecipe() {
        return view('ngst.kiosk.cookbook.add_recipe')->with([
            'kiosk' => 'true',
            'isRecipe' => true,
            'recipe' => true,
            'add_mode' => true,
            'lastLink' => '/' . app()->getLocale() . '/kiosk/cookbook/',
        ]);
    }
}