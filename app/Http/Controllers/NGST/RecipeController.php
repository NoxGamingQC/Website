<?php

namespace App\Http\Controllers\NGST;

use App\Http\Controllers\Controller;
use App\Recipe\IngredientList;
use Illuminate\Http\Request;
use App\Recipe\RecipeSteps;
use App\Recipe\Categories;
use App\Recipe\Recipe;
use Carbon\Carbon;
use App\KioskKey;
use Auth;

class RecipeController extends Controller
{
    public function cookbook(Request $request) {
        if(Auth::check()) {
            if(Auth::user()->isPremium) {
                $categories = Categories::all();

                return view('ngst.kiosk.cookbook.cookbook')->with([
                    'kiosk' => 'true',
                    'categories' => $categories,
                    'recipe' => true,
                    'isRecipe' => false,
                    'lastLink' => '/' . app()->getLocale() . '/kiosk/cookbook',
                ]);
            } else {
                return view('errors.custom')->with([
                    'title' => trans('general.need_premium_title'),
                    'slogan' => trans('general.need_premium_slogan'),
                    'description' => trans('general.need_premium_description'),
                ]);
            }
        } elseif ($request->kiosk_key !== null) {
            $isRealKey = KioskKey::where('key', $request->kiosk_key)->first();
            if($isRealKey) {
                $categories = Categories::all();
                return view('ngst.kiosk.cookbook.cookbook')->with([
                    'kiosk' => 'true',
                    'categories' => $categories,
                    'recipe' => true,
                    'isRecipe' => false,
                    'lastLink' => '/' . app()->getLocale() . '/kiosk/cookbook?kiosk_key=' . $request->kiosk_key,
                ]);
            } else {
                abort(403);
            }
        } else {
            return view('errors.custom')->with([
                'title' => trans('general.need_login_title'),
                'slogan' => trans('general.need_login_slogan'),
                'description' => trans('general.need_login_description'),
            ]);
        }
    }

    public function category(Request $request, $language, $id) {
        
        dd($request->kiosk_key);
        $category = Categories::findOrFail($id);
        $recipes = Recipe::where('category_id', $id)->get();

        return view('ngst.kiosk.cookbook.categories')->with([
            'kiosk' => 'true',
            'category' => $category,
            'recipes' => $recipes,
            'recipe' => true,
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
        $categories = Categories::all();
        return view('ngst.kiosk.cookbook.add_recipe')->with([
            'kiosk' => 'true',
            'categories' => $categories,
            'isRecipe' => true,
            'recipe' => true,
            'add_mode' => true,
            'lastLink' => '/' . app()->getLocale() . '/kiosk/cookbook/',
        ]);
    }

    public function saveRecipe(Request $request) {
        if (Auth::user()) {
            if (Auth::user()->isAdmin || Auth::user()->isMod || Auth::user()->isDev) {
                $recipe = new Recipe();
                $recipe->name_fr = $request->name_fr;
                $recipe->name_en = $request->name_en;
                $recipe->prep_time = $request->prep_time;
                $recipe->cook_time = $request->cook_time;
                $recipe->description_fr = $request->description_fr;
                $recipe->description_en = $request->description_en;
                $recipe->created_by = $request->author;
                $recipe->result = $request->result;
                $recipe->category_id = $request->category;
                $recipe->save();

                foreach($request->ingredients as $key => $value) {
                    $ingredient = new IngredientList();
                    $ingredient->name_fr = $value['name_fr'];
                    $ingredient->name_en = $value['name_en'];
                    $ingredient->recipe_id = $recipe->id;
                    $ingredient->quantity = $value['quantity'];
                    $ingredient->type = $value['type'] ? $value['type'] : null;
                    $ingredient->order = $value['order'];
                    $ingredient->save();
                }
                if($request->steps) {
                    foreach($request->steps as $key => $value) {
                        $step = new RecipeSteps();
                        $step->text_fr = $value['description_fr'];
                        $step->text_en = $value['description_en'];
                        $step->isDanger = (($value['level'] === 'danger')? true : false);
                        $step->isWarning = (($value['level'] === 'warning') ? true : false);
                        $step->recipe_id = $recipe->id;
                        $step->order = $value['order'];
                        $step->save();
                    }
                }
            }
        }
    }
}