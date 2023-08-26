<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function index($language)
    {
        if($language == 'fr-ca' || $language == 'en-ca') {
            app()->setLocale($language);
        } else {
            abort(403);
        }

        return redirect(app()->getLocale() . '/');
    }
}
