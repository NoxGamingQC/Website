<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Model\Recipe\IngredientList;
use Illuminate\Http\Request;
use App\Model\Recipe\RecipeSteps;
use App\Model\Recipe\Categories;
use App\Model\Recipe\Recipe;
use Carbon\Carbon;
use App\Model\KioskKey;

class RecipeController extends Controller
{
    public function cookbook(Request $request) {
        if(Auth::check()) {
            if(Auth::user()->has_premium) {
                $categories = Categories::where('is_shown', true)->orderBy('name_' . (app()->getLocale() == 'fr-ca' ? 'fr' : 'en'))->get();

                return view('view.premium.cookbook.cookbook')->with([
                    'kiosk' => 'true',
                    'categories' => $categories,
                    'recipe' => true,
                    'isRecipe' => false,
                    'lastLink' => '/' . app()->getLocale(),
                    'name' => Auth::user()->name
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
                $categories = Categories::where('is_shown', true)->orderBy('name_' . (app()->getLocale() == 'fr-ca' ? 'fr' : 'en'))->get();
                return view('view.premium.cookbook.cookbook')->with([
                    'kiosk' => 'true',
                    'categories' => $categories,
                    'recipe' => true,
                    'isRecipe' => false,
                    'kiosk_key' => $request->kiosk_key,
                    'lastLink' => '/' . app()->getLocale() . '/cookbook?kiosk_key=' . $request->kiosk_key,
                    'name' => $isRealKey->name
                ]);
            } else {
                abort(403);
            }
        } else {
            return view('errors.custom')->with([
                'title' => trans('general.need_login_title'),
                'slogan' => trans('general.need_login_slogan'),
                'description' => trans('general.need_login_description'),
                'redirect' => '/' . app()->getLocale() . '/login'
            ]);
        }
    }

    public function category(Request $request, $language, $id) {
        if(Auth::check()) {
            if(Auth::user()->has_premium) {
                $category = Categories::findOrFail($id);
                $recipes = Recipe::where('category_id', $id)->orderBy('name_' . (app()->getLocale() == 'fr-ca' ? 'fr' : 'en'))->get();

                return view('view.premium.cookbook.categories')->with([
                    'kiosk' => 'true',
                    'category' => $category,
                    'recipes' => $recipes,
                    'recipe' => true,
                    'isRecipe' => false,
                    'lastLink' => '/' . app()->getLocale() . '/cookbook',
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
                $category = Categories::findOrFail($id);
                $recipes = Recipe::where('category_id', $id)->orderBy('name_' . (app()->getLocale() == 'fr-ca' ? 'fr' : 'en'))->get();
        
                return view('view.premium.cookbook.categories')->with([
                    'kiosk' => 'true',
                    'category' => $category,
                    'recipes' => $recipes,
                    'recipe' => true,
                    'isRecipe' => false,
                    'kiosk_key' => $request->kiosk_key,
                    'lastLink' => '/' . app()->getLocale() . '/cookbook?kiosk_key='. $request->kiosk_key,
                ]);
            } else {
                abort(403);
            }
        } else {
            return view('errors.custom')->with([
                'title' => trans('general.need_login_title'),
                'slogan' => trans('general.need_login_slogan'),
                'description' => trans('general.need_login_description'),
                'redirect' => '/' . app()->getLocale() . '/login'
            ]);
        }
    }

    public function recipe(Request $request, $language, $id) {
        
        if(Auth::check()) {
            if(Auth::user()->has_premium) {
                $recipe = Recipe::findOrFail($id);
                $recipe->category = $recipe->getCategory();
                $recipe->ingredients = $recipe->getIngredients();
                $recipe->steps = $recipe->getSteps();

                return view('view.premium.cookbook.recipe')->with([
                    'kiosk' => 'true',
                    'isRecipe' => true,
                    'recipe' => $recipe,
                    'lastLink' => '/' . app()->getLocale() . '/cookbook/' . $recipe->category->id,
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
                $recipe = Recipe::findOrFail($id);
                $recipe->category = $recipe->getCategory();
                $recipe->ingredients = $recipe->getIngredients();
                $recipe->steps = $recipe->getSteps();

                return view('view.premium.cookbook.recipe')->with([
                    'kiosk' => 'true',
                    'isRecipe' => true,
                    'recipe' => $recipe,
                    'kiosk_key' => $request->kiosk_key,
                    'lastLink' => '/' . app()->getLocale() . '/cookbook/'. $recipe->category->id . '?kiosk_key='. $request->kiosk_key,
                ]);
            } else {
                abort(403);
            }
        } else {
            return view('errors.custom')->with([
                'title' => trans('general.need_login_title'),
                'slogan' => trans('general.need_login_slogan'),
                'description' => trans('general.need_login_description'),
                'redirect' => '/' . app()->getLocale() . '/login'
            ]);
        }
    }

    public function addRecipe() {
        if (Auth::user()) {
            if (Auth::user()->hasPermission('create_recipe')) {
                $categories = Categories::all();
                return view('view.premium.cookbook.add_recipe')->with([
                    'kiosk' => 'true',
                    'categories' => $categories,
                    'isRecipe' => true,
                    'recipe' => true,
                    'add_mode' => true,
                    'lastLink' => '/' . app()->getLocale() . '/cookbook/',
                ]);
            }
        }
        abort(403);
    }

    public function editRecipe($language, $id) {
        if (Auth::user()) {
            if (Auth::user()->hasPermission('edit_recipe')) {
                $categories = Categories::all();
                $recipe = Recipe::findOrFail($id);
                $recipe->category = $recipe->getCategory();
                $recipe->ingredients = $recipe->getIngredients();
                $recipe->steps = $recipe->getSteps();
                return view('view.premium.cookbook.edit_recipe')->with([
                    'id' => $id,
                    'kiosk' => 'true',
                    'categories' => $categories,
                    'isRecipe' => true,
                    'recipe' => $recipe,
                    'add_mode' => true,
                    'lastLink' => '/' . app()->getLocale() . '/cookbook/',
                ]);
            }
        }
        abort(403);
    }

    public function saveEditedRecipe(Request $request) {
        if (Auth::user()) {
            if(Auth::user()->hasPermission('edit_recipe')) {
                $recipe = Recipe::findOrFail($request->id);
                $recipe->name_fr = $request->name_fr;
                $recipe->name_en = $request->name_en;
                $recipe->prep_time = $request->prep_time;
                $recipe->cook_time = $request->cook_time;
                $recipe->is_blw = $request->is_blw;
                $recipe->has_alcohol = $request->has_alcohol;
                $recipe->description_fr = $request->description_fr;
                $recipe->description_en = $request->description_en;
                $recipe->created_by = $request->author;
                $recipe->result = $request->result;
                $recipe->category_id = $request->category;
                $recipe->save();

                foreach($request->ingredients as $key => $value) {
                    if($value['id'] === 'new') {
                        $ingredient = new IngredientList();
                    } else {
                        $ingredient = IngredientList::findOrFail($value['id']);
                    }
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
                        if($value['id'] === 'new') {
                            $step = new RecipeSteps();
                        } else {
                            $step = RecipeSteps::findOrFail($value['id']);
                        }
                        $step->text_fr = $value['description_fr'];
                        $step->text_en = $value['description_en'];
                        $step->is_danger = (($value['level'] === 'danger')? true : false);
                        $step->is_warning = (($value['level'] === 'warning') ? true : false);
                        $step->recipe_id = $recipe->id;
                        $step->order = $value['order'];
                        $step->save();
                    }
                }
            }
        }
    }

    public function saveRecipe(Request $request) {
        if (Auth::user()) {
            if (Auth::user()->hasPermission('create_recipe')) {
                $recipe = new Recipe();
                $recipe->name_fr = $request->name_fr;
                $recipe->name_en = $request->name_en;
                $recipe->prep_time = $request->prep_time;
                $recipe->cook_time = $request->cook_time;
                $recipe->is_blw = $request->is_blw;
                $recipe->has_alcohol = $request->has_alcohol;
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
                        $step->is_danger = (($value['level'] === 'danger')? true : false);
                        $step->is_warning = (($value['level'] === 'warning') ? true : false);
                        $step->recipe_id = $recipe->id;
                        $step->order = $value['order'];
                        $step->save();
                    }
                }
            }
        }
    }
}