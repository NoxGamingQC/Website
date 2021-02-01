<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LanguageController extends Controller
{
    public function index($language)
    {
        if($language == 'fr' || $language == 'en') {
            app()->setLocale($language);
        } else {
            abort(403);
        }

        return redirect(app()->getLocale() . '/home');
    }
}
