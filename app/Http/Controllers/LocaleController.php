<?php

namespace App\Http\Controllers;

use Redirect;
use Session;

use App\Http\Controllers\Controller;

class LocaleController extends Controller
{
    /**
     * Switch the locale of the website into English.
     *
     * @return Redirect
     */
    public function english()
    {
        Session::put('locale', 'en');
        return Redirect::back();
    }

    /**
     * Switch the locale of the website into French.
     *
     * @return Redirect
     */
    public function french()
    {
        Session::put('locale', 'fr');
        return Redirect::back();
    }

}
